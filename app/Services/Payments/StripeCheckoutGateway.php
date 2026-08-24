<?php

namespace App\Services\Payments;

use RuntimeException;
use Stripe\Checkout\Session;
use Stripe\Event;
use Stripe\Stripe;
use Stripe\Webhook;

class StripeCheckoutGateway
{
    public function createCheckoutSession(array $parameters, string $idempotencyKey): Session
    {
        $this->configure();

        return Session::create(
            $parameters,
            ['idempotency_key' => $idempotencyKey]
        );
    }

    public function retrieveCheckoutSession(string $sessionId): Session
    {
        $this->configure();

        return Session::retrieve($sessionId);
    }

    public function constructWebhookEvent(string $payload, string $signature, string $secret): Event
    {
        return Webhook::constructEvent($payload, $signature, $secret);
    }

    private function configure(): void
    {
        $secret = trim((string) config('stripe.sk'));

        if ($secret === '') {
            throw new RuntimeException('Stripe secret key is not configured.');
        }

        Stripe::setApiKey($secret);
    }
}
