<?php

namespace Tests\Feature\Payments;

use App\Exceptions\PaymentReconciliationException;
use App\Services\Payments\CheckoutFinalizer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\Support\CreatesCommerceData;
use Tests\TestCase;

class CheckoutFinalizerTest extends TestCase
{
    use CreatesCommerceData;
    use RefreshDatabase;

    public function test_it_finalizes_every_order_line_and_decrements_inventory_once(): void
    {
        $product = $this->createProduct(['product_quantity' => 10]);
        $reference = (string) Str::uuid();
        $sessionId = 'cs_test_paid';

        $first = $this->createOrder($product, [
            'session_id' => $sessionId,
            'checkout_reference' => $reference,
            'order_quantity' => 2,
        ]);
        $second = $this->createOrder($product, [
            'session_id' => $sessionId,
            'checkout_reference' => $reference,
            'order_quantity' => 3,
        ]);

        $orders = app(CheckoutFinalizer::class)->finalize($sessionId, $reference);

        self::assertCount(2, $orders);
        self::assertSame('paid', $first->fresh()->status);
        self::assertSame('paid', $second->fresh()->status);
        self::assertSame(5, (int) $product->fresh()->product_quantity);
    }

    public function test_duplicate_finalization_is_idempotent(): void
    {
        $product = $this->createProduct(['product_quantity' => 10]);
        $order = $this->createOrder($product, [
            'session_id' => 'cs_test_duplicate',
            'order_quantity' => 2,
        ]);

        $finalizer = app(CheckoutFinalizer::class);
        $finalizer->finalize($order->session_id, $order->checkout_reference);
        $finalizer->finalize($order->session_id, $order->checkout_reference);

        self::assertSame('paid', $order->fresh()->status);
        self::assertSame(8, (int) $product->fresh()->product_quantity);
    }

    public function test_checkout_reference_recovers_rows_when_the_session_link_was_not_saved(): void
    {
        $product = $this->createProduct(['product_quantity' => 5]);
        $reference = (string) Str::uuid();
        $order = $this->createOrder($product, [
            'session_id' => 'pending:' . $reference,
            'checkout_reference' => $reference,
            'status' => 'checkout_pending',
            'order_quantity' => 2,
        ]);

        app(CheckoutFinalizer::class)->finalize('cs_test_recovered', $reference);

        $order->refresh();
        self::assertSame('paid', $order->status);
        self::assertSame('cs_test_recovered', $order->session_id);
        self::assertSame(3, (int) $product->fresh()->product_quantity);
    }

    public function test_missing_local_checkout_fails_explicitly(): void
    {
        $this->expectException(PaymentReconciliationException::class);
        $this->expectExceptionMessage('No local checkout rows match Stripe session');

        app(CheckoutFinalizer::class)->finalize('cs_test_missing');
    }

    public function test_insufficient_inventory_rolls_back_all_products_and_orders(): void
    {
        $firstProduct = $this->createProduct([
            'product_name' => 'Available product',
            'product_quantity' => 10,
        ]);
        $secondProduct = $this->createProduct([
            'product_name' => 'Unavailable product',
            'product_quantity' => 1,
        ]);
        $reference = (string) Str::uuid();
        $sessionId = 'cs_test_insufficient';

        $firstOrder = $this->createOrder($firstProduct, [
            'session_id' => $sessionId,
            'checkout_reference' => $reference,
            'order_quantity' => 2,
        ]);
        $secondOrder = $this->createOrder($secondProduct, [
            'session_id' => $sessionId,
            'checkout_reference' => $reference,
            'order_quantity' => 2,
        ]);

        try {
            app(CheckoutFinalizer::class)->finalize($sessionId, $reference);
            self::fail('Expected payment reconciliation to fail.');
        } catch (PaymentReconciliationException $exception) {
            self::assertStringContainsString('insufficient inventory', $exception->getMessage());
        }

        self::assertSame(10, (int) $firstProduct->fresh()->product_quantity);
        self::assertSame(1, (int) $secondProduct->fresh()->product_quantity);
        self::assertSame('unpaid', $firstOrder->fresh()->status);
        self::assertSame('unpaid', $secondOrder->fresh()->status);
    }
}
