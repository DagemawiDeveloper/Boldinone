<?php

namespace App\Services\Payments;

use App\Models\Shop\Balance;
use App\Models\Shop\StripeWebhookEvent;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;
use Throwable;

class StripeEventProcessor
{
    public function __construct(private readonly CheckoutFinalizer $finalizer)
    {
    }

    /**
     * @return array{state:string,event:StripeWebhookEvent}
     */
    public function process(object $event): array
    {
        $eventId = trim((string) ($event->id ?? ''));
        $eventType = trim((string) ($event->type ?? ''));

        if ($eventId === '' || $eventType === '') {
            throw new InvalidArgumentException('Stripe events require an ID and type.');
        }

        $eventObject = $event->data->object ?? null;
        $checkoutSessionId = $this->checkoutSessionId($eventType, $eventObject);

        StripeWebhookEvent::query()->firstOrCreate(
            ['stripe_event_id' => $eventId],
            [
                'event_type' => $eventType,
                'checkout_session_id' => $checkoutSessionId,
                'status' => 'received',
            ]
        );

        $claim = DB::transaction(function () use ($eventId, $eventType, $checkoutSessionId) {
            $record = StripeWebhookEvent::query()
                ->where('stripe_event_id', $eventId)
                ->lockForUpdate()
                ->firstOrFail();

            if ($record->status === 'processed') {
                return ['state' => 'duplicate', 'event' => $record];
            }

            if ($record->status === 'processing'
                && $record->updated_at !== null
                && $record->updated_at->isAfter(now()->subMinutes(5))) {
                return ['state' => 'processing', 'event' => $record];
            }

            $record->forceFill([
                'event_type' => $eventType,
                'checkout_session_id' => $checkoutSessionId,
                'status' => 'processing',
                'last_error' => null,
            ])->save();

            return ['state' => 'claimed', 'event' => $record];
        }, 3);

        if ($claim['state'] !== 'claimed') {
            return $claim;
        }

        /** @var StripeWebhookEvent $record */
        $record = $claim['event'];

        try {
            $this->apply($eventType, $eventObject);

            $record->forceFill([
                'status' => 'processed',
                'processed_at' => now(),
                'last_error' => null,
            ])->save();
        } catch (Throwable $exception) {
            $record->forceFill([
                'status' => 'failed',
                'last_error' => mb_substr($exception->getMessage(), 0, 2000),
            ])->save();

            throw $exception;
        }

        return ['state' => 'processed', 'event' => $record->fresh()];
    }

    private function apply(string $eventType, mixed $eventObject): void
    {
        if (in_array($eventType, [
            'checkout.session.completed',
            'checkout.session.async_payment_succeeded',
        ], true)) {
            if (! is_object($eventObject)) {
                throw new InvalidArgumentException('Stripe checkout event data is missing.');
            }

            $paymentStatus = (string) ($eventObject->payment_status ?? '');
            $shouldFinalize = $eventType === 'checkout.session.async_payment_succeeded'
                || $paymentStatus === 'paid';

            if ($shouldFinalize) {
                $sessionId = trim((string) ($eventObject->id ?? ''));
                $checkoutReference = $this->metadataValue($eventObject, 'checkout_reference');
                $this->finalizer->finalize($sessionId, $checkoutReference);
            }

            return;
        }

        if ($eventType === 'balance.available' && is_object($eventObject)) {
            $this->updateStripeBalance($eventObject);
        }
    }

    private function checkoutSessionId(string $eventType, mixed $eventObject): ?string
    {
        if (! str_starts_with($eventType, 'checkout.session.') || ! is_object($eventObject)) {
            return null;
        }

        $sessionId = trim((string) ($eventObject->id ?? ''));

        return $sessionId !== '' ? $sessionId : null;
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

    private function updateStripeBalance(object $balance): void
    {
        $balanceRecord = Balance::query()->first();

        if ($balanceRecord === null) {
            return;
        }

        $available = $balance->available[0] ?? null;
        $pending = $balance->pending[0] ?? null;

        if ($available !== null) {
            $balanceRecord->available_amount = $available->amount ?? 0;
            $balanceRecord->available_currency = $available->currency ?? null;
            $balanceRecord->available_card = $available->source_types->card ?? 0;
        }

        if ($pending !== null) {
            $balanceRecord->pending_amount = $pending->amount ?? 0;
            $balanceRecord->pending_currency = $pending->currency ?? null;
            $balanceRecord->pending_card = $pending->source_types->card ?? 0;
        }

        $balanceRecord->save();
    }
}
