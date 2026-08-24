<?php

namespace App\Services\Payments;

use App\Exceptions\PaymentReconciliationException;
use App\Models\Shop\OrderProduct;
use App\Models\Shop\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

final class CheckoutFinalizer
{
    /**
     * Mark one Checkout Session paid exactly once and decrement inventory in
     * the same transaction. A checkout reference is accepted as a recovery
     * path when Stripe succeeded before the local session ID update committed.
     */
    public function finalize(string $sessionId, ?string $checkoutReference = null): Collection
    {
        $sessionId = trim($sessionId);
        $checkoutReference = $checkoutReference !== null ? trim($checkoutReference) : null;

        if ($sessionId === '') {
            throw new InvalidArgumentException('A Stripe Checkout Session ID is required.');
        }

        return DB::transaction(function () use ($sessionId, $checkoutReference) {
            $orders = OrderProduct::query()
                ->where(function ($query) use ($sessionId, $checkoutReference) {
                    $query->where('session_id', $sessionId);

                    if ($checkoutReference !== null && $checkoutReference !== '') {
                        $query->orWhere('checkout_reference', $checkoutReference);
                    }
                })
                ->orderBy('id')
                ->lockForUpdate()
                ->get();

            if ($orders->isEmpty()) {
                throw new PaymentReconciliationException(
                    "No local checkout rows match Stripe session {$sessionId}."
                );
            }

            $unpaidOrders = $orders->reject(
                static fn (OrderProduct $order): bool => $order->status === 'paid'
            );

            if ($unpaidOrders->isEmpty()) {
                return $orders;
            }

            $requiredByProduct = [];

            foreach ($unpaidOrders as $order) {
                $productId = (int) $order->product_id;
                $quantity = (int) $order->order_quantity;

                if ($productId < 1 || $quantity < 1) {
                    throw new PaymentReconciliationException(
                        "Order row {$order->id} has an invalid product or quantity."
                    );
                }

                $requiredByProduct[$productId] = ($requiredByProduct[$productId] ?? 0) + $quantity;
            }

            $productIds = array_keys($requiredByProduct);
            sort($productIds, SORT_NUMERIC);

            $products = Product::query()
                ->whereIn('id', $productIds)
                ->orderBy('id')
                ->lockForUpdate()
                ->get()
                ->keyBy('id');

            foreach ($requiredByProduct as $productId => $requiredQuantity) {
                /** @var Product|null $product */
                $product = $products->get($productId);

                if ($product === null) {
                    throw new PaymentReconciliationException(
                        "Unable to finalize paid checkout: product {$productId} was not found."
                    );
                }

                if ((int) $product->product_quantity < $requiredQuantity) {
                    throw new PaymentReconciliationException(
                        "Unable to finalize paid checkout: product {$productId} has insufficient inventory."
                    );
                }
            }

            foreach ($requiredByProduct as $productId => $requiredQuantity) {
                /** @var Product $product */
                $product = $products->get($productId);
                $product->product_quantity = (int) $product->product_quantity - $requiredQuantity;
                $product->save();
            }

            foreach ($unpaidOrders as $order) {
                $order->status = 'paid';
                $order->session_id = $sessionId;

                if (($order->checkout_reference === null || $order->checkout_reference === '')
                    && $checkoutReference !== null
                    && $checkoutReference !== '') {
                    $order->checkout_reference = $checkoutReference;
                }

                $order->save();
            }

            return OrderProduct::query()
                ->whereKey($orders->modelKeys())
                ->orderBy('id')
                ->get();
        }, 3);
    }
}
