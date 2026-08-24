# Security Notes

Boldinone integrates authentication, role-based administration, catalog/inventory state, and Stripe Checkout. This document records the security and reliability boundaries that matter when running or extending the project.

## Secrets

Application and payment secrets must be supplied through protected runtime configuration and must never be committed to Git.

```dotenv
APP_KEY=
STRIPE_KEY=pk_test_...
STRIPE_SECRET=sk_test_...
STRIPE_WEBHOOK_SECRET=whsec_...
```

Production deployments should use the hosting platform's secret manager or protected environment configuration rather than deployment scripts or repository files.

## Server-authoritative commerce data

Session/cart values are UX state, not trusted financial input.

Before Checkout is created, the application reloads products from the database and uses server-side identity, price, availability, and stock. Modified or stale cart prices cannot determine Stripe's `unit_amount`.

Stock is checked again under a database lock during payment finalization.

## Local-first checkout persistence

The application persists `checkout_pending` order rows before calling Stripe. The provider request carries a stable idempotency key and an internal `checkout_reference`.

This provides two recovery properties:

- a provider/network failure leaves an auditable local attempt;
- if Stripe succeeds but the local Session-ID update is interrupted, the webhook metadata can recover the pending rows through `checkout_reference`.

## Stripe webhook authentication

Webhook requests are verified using:

- the exact raw request body;
- the `Stripe-Signature` header;
- `STRIPE_WEBHOOK_SECRET`.

Invalid payloads or signatures receive HTTP `400` and are not processed.

The webhook route is excluded from browser CSRF protection because Stripe cannot provide a Laravel CSRF token. Stripe's cryptographic signature is the authentication mechanism for that endpoint.

## Event idempotency and audit trail

Stripe can deliver the same event more than once. `stripe_webhook_events` stores each event by unique Stripe event ID and records processing state.

- `processed` events return a duplicate-safe response without changing inventory again.
- `processing` events are not claimed concurrently while the claim is fresh.
- `failed` events retain a bounded error and can be retried.
- local reconciliation failures return HTTP `500` so Stripe can redeliver instead of being told the event succeeded.

## Atomic inventory finalization

`CheckoutFinalizer` uses a database transaction and row locks.

It validates every affected product and quantity before changing any inventory. Product locks are acquired in deterministic ID order. Only after all requirements pass does it:

- decrement product inventory;
- mark unpaid order rows paid;
- attach the real Stripe Session ID when recovering by checkout reference.

Already-paid rows are skipped, so the browser success request and webhook may safely race or repeat.

An insufficient or missing product rolls back the full transaction. The application never intentionally leaves a checkout half-finalized.

## Checkout ownership

The Stripe Session stores the authenticated customer ID in metadata. The success endpoint verifies that metadata against the current Laravel user and scopes the local order query to the same user.

Knowledge of a different Session ID is therefore insufficient to display or finalize another customer's checkout through the browser endpoint.

## Authorization

Administrative routes require authentication plus the `admin` role. Customer payment routes require authentication plus the `customers` role.

Future changes should preserve these route-level boundaries and add policies or feature tests for sensitive mutations such as product, order, role, permission, invitation, and application-setting changes.

## Input and output handling

Laravel validation or Form Requests should protect write boundaries. Blade output should remain escaped unless deliberately rendering reviewed trusted HTML.

Database columns use bounded types for identifiers/statuses and decimal types for money. Monetary values should not be represented by floating-point arithmetic in new domain logic; provider minor units and fixed-precision database values are preferred.

## Payment data

Stripe-hosted Checkout keeps raw card numbers outside this Laravel application. Store only the provider identifiers and business data required for authorization, fulfillment, auditing, and reconciliation.

Do not log:

- card data;
- full provider secrets;
- complete webhook payloads containing personal data;
- authentication/session tokens.

## Automated controls

GitHub Actions performs:

- Composer metadata validation;
- dependency resolution and security auditing;
- a clean `migrate:fresh` against SQLite;
- PHP syntax linting;
- PHPUnit execution on PHP 8.2, 8.3, and 8.4;
- a tracked-file scan for obvious live Stripe keys and private-key blocks.

Pattern scans are defense in depth, not a substitute for a dedicated full-history scanner such as Gitleaks and real credential rotation after exposure.

## Operational follow-up for a real deployment

A production deployment should also add:

- alerting for repeatedly failed Stripe events;
- a scheduled reconciliation job comparing local state with Stripe;
- explicit retention/redaction rules for payment events and order data;
- database backups and tested recovery procedures;
- rate limiting and abuse monitoring;
- structured logs with request/correlation IDs;
- provider API version pinning and planned upgrade reviews.

## Reporting a security issue

Do not place credentials, private keys, personal data, or exploit-sensitive details in a public issue. Contact the repository owner privately for sensitive reports.
