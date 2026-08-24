<?php

namespace Tests\Feature\Payments;

use App\Exceptions\PaymentReconciliationException;
use App\Models\Shop\StripeWebhookEvent;
use App\Services\Payments\StripeEventProcessor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Support\CreatesCommerceData;
use Tests\TestCase;

class StripeEventProcessorTest extends TestCase
{
    use CreatesCommerceData;
    use RefreshDatabase;

    public function test_a_paid_checkout_event_is_processed_once_even_when_stripe_retries_it(): void
    {
        $product = $this->createProduct(['product_quantity' => 7]);
        $order = $this->createOrder($product, [
            'session_id' => 'cs_test_event',
            'checkout_reference' => 'a558bd5d-3fe7-4b78-b347-c5d21e3df90f',
            'order_quantity' => 2,
        ]);
        $event = $this->checkoutEvent(
            'evt_test_paid',
            $order->session_id,
            $order->checkout_reference
        );

        $processor = app(StripeEventProcessor::class);
        $first = $processor->process($event);
        $duplicate = $processor->process($event);

        self::assertSame('processed', $first['state']);
        self::assertSame('duplicate', $duplicate['state']);
        self::assertSame('paid', $order->fresh()->status);
        self::assertSame(5, (int) $product->fresh()->product_quantity);
        self::assertSame(1, StripeWebhookEvent::query()->count());
        self::assertDatabaseHas('stripe_webhook_events', [
            'stripe_event_id' => 'evt_test_paid',
            'status' => 'processed',
            'checkout_session_id' => 'cs_test_event',
        ]);
    }

    public function test_a_failed_reconciliation_is_recorded_for_a_future_retry(): void
    {
        $event = $this->checkoutEvent(
            'evt_test_missing_checkout',
            'cs_test_missing_checkout',
            '4b63e3da-d2aa-44f5-ad8e-9eca117f04e3'
        );

        try {
            app(StripeEventProcessor::class)->process($event);
            self::fail('Expected the missing checkout to fail reconciliation.');
        } catch (PaymentReconciliationException $exception) {
            self::assertStringContainsString('No local checkout rows', $exception->getMessage());
        }

        $record = StripeWebhookEvent::query()
            ->where('stripe_event_id', 'evt_test_missing_checkout')
            ->firstOrFail();

        self::assertSame('failed', $record->status);
        self::assertNull($record->processed_at);
        self::assertStringContainsString('No local checkout rows', (string) $record->last_error);
    }

    public function test_an_unpaid_checkout_event_is_audited_without_changing_inventory(): void
    {
        $product = $this->createProduct(['product_quantity' => 4]);
        $order = $this->createOrder($product, [
            'session_id' => 'cs_test_unpaid',
            'order_quantity' => 2,
        ]);
        $event = $this->checkoutEvent(
            'evt_test_unpaid',
            $order->session_id,
            $order->checkout_reference,
            'unpaid'
        );

        $result = app(StripeEventProcessor::class)->process($event);

        self::assertSame('processed', $result['state']);
        self::assertSame('unpaid', $order->fresh()->status);
        self::assertSame(4, (int) $product->fresh()->product_quantity);
    }

    private function checkoutEvent(
        string $eventId,
        string $sessionId,
        string $checkoutReference,
        string $paymentStatus = 'paid'
    ): object {
        return (object) [
            'id' => $eventId,
            'type' => 'checkout.session.completed',
            'data' => (object) [
                'object' => (object) [
                    'id' => $sessionId,
                    'payment_status' => $paymentStatus,
                    'metadata' => (object) [
                        'checkout_reference' => $checkoutReference,
                    ],
                ],
            ],
        ];
    }
}
