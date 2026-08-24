<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\OrderProduct;
use App\Models\Shop\Product;
use App\Models\User;
use App\Services\Payments\CheckoutFinalizer;
use App\Services\Payments\StripeCheckoutGateway;
use App\Services\Payments\StripeEventProcessor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Stripe\Exception\SignatureVerificationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use UnexpectedValueException;

class StripeController extends Controller
{
    public function __construct(
        private readonly StripeCheckoutGateway $stripe,
        private readonly CheckoutFinalizer $finalizer,
        private readonly StripeEventProcessor $events,
    ) {
    }

    public function session(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('message', 'Your cart is empty.');
        }

        $user = User::query()->findOrFail(Auth::id());
        $products = Product::query()
            ->whereIn('id', array_keys($cart))
            ->get()
            ->keyBy('id');

        $lineItems = [];
        $validatedCart = [];

        foreach ($cart as $productId => $details) {
            $product = $products->get($productId);
            $quantity = max(1, (int) ($details['quantity'] ?? 1));

            if ($product === null) {
                return redirect()->back()->with('message', 'A product in your cart is no longer available.');
            }

            if ((int) $product->product_quantity < $quantity) {
                return redirect()->back()->with(
                    'message',
                    "Not enough stock is available for {$product->product_name}."
                );
            }

            // Cart/session values are UX state only. Product identity, price,
            // availability, and stock always come from the database.
            $price = (float) ($product->product_logical_price ?? $product->product_price);

            if ($price <= 0) {
                return redirect()->back()->with(
                    'message',
                    "{$product->product_name} does not have a valid checkout price."
                );
            }

            $lineItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => (string) $product->product_name,
                    ],
                    'currency' => 'usd',
                    'unit_amount' => (int) round($price * 100),
                ],
                'quantity' => $quantity,
            ];

            $validatedCart[] = [
                'product' => $product,
                'quantity' => $quantity,
                'price' => $price,
            ];
        }

        $checkoutReference = (string) Str::uuid();
        $pendingSessionId = 'pending:' . $checkoutReference;

        DB::transaction(function () use (
            $validatedCart,
            $checkoutReference,
            $pendingSessionId,
            $user
        ) {
            foreach ($validatedCart as $item) {
                /** @var Product $product */
                $product = $item['product'];
                $quantity = $item['quantity'];
                $price = $item['price'];

                OrderProduct::query()->create([
                    'product_id' => $product->id,
                    'product_name' => $product->product_name,
                    'order_quantity' => $quantity,
                    'firstname' => $user->name,
                    'lastname' => $user->lastname,
                    'email' => $user->email,
                    'address' => $user->address,
                    'status' => 'checkout_pending',
                    'each_price' => $price,
                    'total_price' => round($price * $quantity, 2),
                    'checkout_reference' => $checkoutReference,
                    'session_id' => $pendingSessionId,
                    'user_id' => $user->id,
                ]);
            }
        }, 3);

        try {
            $checkoutSession = $this->stripe->createCheckoutSession([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'allow_promotion_codes' => false,
                'metadata' => [
                    'user_id' => (string) $user->id,
                    'checkout_reference' => $checkoutReference,
                ],
                'client_reference_id' => $checkoutReference,
                'customer_email' => $user->email,
                'success_url' => route('customers.success', [], true)
                    . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('shop', [], true),
            ], 'boldinone-checkout-' . $checkoutReference);
        } catch (Throwable $exception) {
            OrderProduct::query()
                ->where('checkout_reference', $checkoutReference)
                ->update(['status' => 'checkout_failed']);

            report($exception);

            return redirect()->back()->with(
                'message',
                'Checkout could not be started. No payment was taken; please try again.'
            );
        }

        try {
            OrderProduct::query()
                ->where('checkout_reference', $checkoutReference)
                ->update([
                    'session_id' => $checkoutSession->id,
                    'status' => 'unpaid',
                ]);
        } catch (Throwable $exception) {
            // Stripe carries checkout_reference in metadata, so a webhook can
            // still recover the durable local rows if this linking update fails.
            report($exception);
        }

        return redirect()->away($checkoutSession->url);
    }

    public function success(Request $request)
    {
        $sessionId = trim((string) $request->get('session_id', ''));

        if ($sessionId === '') {
            throw new NotFoundHttpException();
        }

        try {
            $checkoutSession = $this->stripe->retrieveCheckoutSession($sessionId);
        } catch (Throwable $exception) {
            throw new NotFoundHttpException(previous: $exception);
        }

        $metadataUserId = $this->metadataValue($checkoutSession, 'user_id');
        $checkoutReference = $this->metadataValue($checkoutSession, 'checkout_reference');

        if ($metadataUserId !== (string) Auth::id()) {
            throw new NotFoundHttpException();
        }

        if (($checkoutSession->payment_status ?? null) === 'paid') {
            $this->finalizer->finalize($checkoutSession->id, $checkoutReference);
            session()->forget('cart');
        }

        $orders = OrderProduct::query()
            ->where('user_id', Auth::id())
            ->where(function ($query) use ($checkoutSession, $checkoutReference) {
                $query->where('session_id', $checkoutSession->id);

                if ($checkoutReference !== null) {
                    $query->orWhere('checkout_reference', $checkoutReference);
                }
            })
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
        $endpointSecret = trim((string) config('stripe.webhook_secret'));

        if ($endpointSecret === '') {
            return response()->json(['message' => 'Stripe webhook secret is not configured.'], 500);
        }

        try {
            $event = $this->stripe->constructWebhookEvent(
                $request->getContent(),
                (string) $request->header('Stripe-Signature', ''),
                $endpointSecret
            );
        } catch (UnexpectedValueException | SignatureVerificationException $exception) {
            return response()->json(['message' => 'Invalid Stripe webhook.'], 400);
        }

        try {
            $result = $this->events->process($event);
        } catch (Throwable $exception) {
            report($exception);

            // A non-2xx response asks Stripe to retry after a recoverable local
            // reconciliation failure instead of silently losing the event.
            return response()->json([
                'message' => 'Webhook reconciliation failed and may be retried.',
            ], 500);
        }

        return response()->json([
            'received' => true,
            'state' => $result['state'],
        ]);
    }

    private function metadataValue(object $object, string $key): ?string
    {
        $metadata = $object->metadata ?? null;
        $value = null;

        if (is_array($metadata)) {
            $value = $metadata[$key] ?? null;
        } elseif (is_object($metadata)) {
            $value = $metadata->{$key} ?? null;
        }

        $value = $value !== null ? trim((string) $value) : '';

        return $value !== '' ? $value : null;
    }
}
