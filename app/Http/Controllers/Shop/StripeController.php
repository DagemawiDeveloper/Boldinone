<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Balance;
use App\Models\Shop\OrderProduct;
use App\Models\Shop\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RuntimeException;
use Stripe\Checkout\Session;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Stripe;
use Stripe\Webhook;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use UnexpectedValueException;

class StripeController extends Controller
{
    public function session(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('message', 'Your cart is empty.');
        }

        $user = User::query()->findOrFail(Auth::id());

        Stripe::setApiKey(config('stripe.sk'));

        $lineItems = [];

        foreach ($cart as $details) {
            $price = (float) $details['price'];
            $quantity = max(1, (int) $details['quantity']);

            $lineItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => (string) $details['product_name'],
                    ],
                    'currency' => 'usd',
                    'unit_amount' => (int) round($price * 100),
                ],
                'quantity' => $quantity,
            ];
        }

        $checkoutSession = Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'allow_promotion_codes' => false,
            'metadata' => [
                'user_id' => (string) Auth::id(),
            ],
            'client_reference_id' => (string) Auth::id(),
            'customer_email' => $user->email,
            'success_url' => route('customers.success', [], true) . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('shop', [], true),
        ]);

        DB::transaction(function () use ($cart, $checkoutSession, $user) {
            foreach ($cart as $id => $details) {
                $price = (float) $details['price'];
                $quantity = max(1, (int) $details['quantity']);

                $order = new OrderProduct();
                $order->product_id = $id;
                $order->product_name = $details['product_name'];
                $order->order_quantity = $quantity;
                $order->firstname = $user->name;
                $order->lastname = $user->lastname;
                $order->email = $user->email;
                $order->address = $user->address;
                $order->status = 'unpaid';
                $order->each_price = $price;
                $order->total_price = round($price * $quantity, 2);
                $order->session_id = $checkoutSession->id;
                $order->user_id = Auth::id();
                $order->save();
            }
        });

        return redirect()->away($checkoutSession->url);
    }

    public function success(Request $request)
    {
        Stripe::setApiKey(config('stripe.sk'));

        $sessionId = (string) $request->get('session_id', '');

        if ($sessionId === '') {
            throw new NotFoundHttpException();
        }

        try {
            $checkoutSession = Session::retrieve($sessionId);
        } catch (\Throwable $exception) {
            throw new NotFoundHttpException();
        }

        $sessionUserId = (string) ($checkoutSession->client_reference_id ?? '');
        $metadataUserId = (string) ($checkoutSession->metadata->user_id ?? '');
        $currentUserId = (string) Auth::id();

        if ($sessionUserId !== $currentUserId && $metadataUserId !== $currentUserId) {
            throw new NotFoundHttpException();
        }

        if (($checkoutSession->payment_status ?? null) === 'paid') {
            $this->markSessionPaid($checkoutSession->id);
            session()->forget('cart');
        }

        $orders = OrderProduct::query()
            ->where('session_id', $checkoutSession->id)
            ->where('user_id', Auth::id())
            ->get();

        if ($orders->isEmpty()) {
            throw new NotFoundHttpException();
        }

        return view('shop.success', [
            'success' => $orders,
            'order' => $orders->first(),
        ]);
    }

    public function cancel()
    {
        return redirect()->route('shop')->with('message', 'Checkout was cancelled.');
    }

    public function webhook(Request $request)
    {
        $endpointSecret = (string) config('stripe.webhook_secret');

        if ($endpointSecret === '') {
            return response()->json(['message' => 'Stripe webhook secret is not configured.'], 500);
        }

        $payload = $request->getContent();
        $signature = (string) $request->header('Stripe-Signature', '');

        try {
            $event = Webhook::constructEvent($payload, $signature, $endpointSecret);
        } catch (UnexpectedValueException | SignatureVerificationException $exception) {
            return response()->json(['message' => 'Invalid Stripe webhook.'], 400);
        }

        switch ($event->type) {
            case 'checkout.session.completed':
            case 'checkout.session.async_payment_succeeded':
                $checkoutSession = $event->data->object;

                if (
                    $event->type === 'checkout.session.async_payment_succeeded'
                    || ($checkoutSession->payment_status ?? null) === 'paid'
                ) {
                    $this->markSessionPaid($checkoutSession->id);
                }
                break;

            case 'balance.available':
                $this->updateStripeBalance($event->data->object);
                break;
        }

        // Stripe expects a 2xx response for successfully handled events.
        return response()->json(['received' => true]);
    }

    /**
     * Transition all order lines for a Checkout Session to paid exactly once.
     *
     * Both the browser success redirect and Stripe webhook may arrive for the
     * same payment. Row locks plus the status guard prevent duplicate stock
     * decrements when those requests race or Stripe retries an event.
     */
    private function markSessionPaid(string $sessionId): void
    {
        DB::transaction(function () use ($sessionId) {
            $orders = OrderProduct::query()
                ->where('session_id', $sessionId)
                ->lockForUpdate()
                ->get();

            foreach ($orders as $order) {
                if ($order->status === 'paid') {
                    continue;
                }

                $quantity = max(1, (int) $order->order_quantity);
                $product = Product::query()
                    ->whereKey($order->product_id)
                    ->lockForUpdate()
                    ->first();

                if (!$product) {
                    throw new RuntimeException('Unable to finalize paid order: product not found.');
                }

                if ((int) $product->product_quantity < $quantity) {
                    throw new RuntimeException('Unable to finalize paid order: insufficient inventory.');
                }

                $order->status = 'paid';
                $order->save();

                $product->product_quantity = (int) $product->product_quantity - $quantity;
                $product->save();
            }
        });
    }

    private function updateStripeBalance($balance): void
    {
        $balanceRecord = Balance::query()->first();

        if (!$balanceRecord) {
            return;
        }

        $available = $balance->available[0] ?? null;
        $pending = $balance->pending[0] ?? null;

        if ($available) {
            $balanceRecord->available_amount = $available->amount ?? 0;
            $balanceRecord->available_currency = $available->currency ?? null;
            $balanceRecord->available_card = $available->source_types->card ?? 0;
        }

        if ($pending) {
            $balanceRecord->pending_amount = $pending->amount ?? 0;
            $balanceRecord->pending_currency = $pending->currency ?? null;
            $balanceRecord->pending_card = $pending->source_types->card ?? 0;
        }

        $balanceRecord->save();
    }
}
