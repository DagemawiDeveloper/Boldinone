# Security Notes

Boldinone integrates authentication, role-based administration and Stripe payments. This document records the security boundaries that matter most when running or extending the project.

## Secrets

Payment and application secrets must be supplied through environment variables and must never be committed to Git.

```dotenv
APP_KEY=
STRIPE_KEY=pk_test_...
STRIPE_SECRET=sk_test_...
STRIPE_WEBHOOK_SECRET=whsec_...
```

For production deployments, use the hosting platform's secret manager or protected environment configuration rather than storing secrets in deployment scripts.

## Stripe webhooks

Stripe webhook requests are verified using the raw request payload, the `Stripe-Signature` header and the endpoint signing secret. Invalid payloads/signatures receive HTTP 400.

Successfully processed events receive HTTP 2xx so Stripe does not retry them unnecessarily.

### Retry/idempotency protection

Payment providers can deliver an event multiple times, and the browser success redirect may race the webhook.

`markSessionPaid()` therefore:

- wraps payment/inventory changes in a database transaction;
- locks order rows for the Checkout Session;
- skips order lines already marked `paid`;
- locks the corresponding product before inventory mutation;
- verifies enough inventory remains before decrementing it.

This prevents repeated success requests or webhook retries from decrementing inventory more than once.

## Checkout ownership

The Stripe Checkout Session stores the authenticated user ID as both metadata and `client_reference_id`.

The browser success endpoint verifies that the retrieved Stripe session belongs to the currently authenticated customer before displaying local order data or finalizing state.

## Server-authoritative prices

Session/cart values are **not trusted as payment prices**.

Before a Stripe Checkout Session is created, the application reloads each product from the database and uses the server-side product name, price and available stock. This protects the checkout amount from client/session tampering and stale cart values.

Stock is checked again during payment finalization under a database lock.

## Authorization

Administrative resources are grouped behind both authentication and role middleware. Customer-only routes also use authentication and a customer role boundary.

Future feature work should preserve these route-level controls and add policy/feature tests for sensitive mutations such as:

- product changes
- order changes
- role/permission changes
- user invitations
- application settings

## Input handling

Laravel validation should be applied at controller or Form Request boundaries before writes. Output rendered into Blade templates should remain escaped unless intentionally rendering trusted HTML.

## Payment data

The application uses Stripe Checkout so raw card numbers should never pass through or be stored by this Laravel application. Persist only provider identifiers and the business data required for reconciliation.

## CSRF and webhook routes

Normal browser mutations should remain protected by Laravel CSRF middleware. The Stripe webhook route is excluded from CSRF because Stripe cannot supply a Laravel CSRF token; authenticity is enforced using Stripe's cryptographic webhook signature instead.

## Operational follow-up

For a higher-scale production deployment, add:

- an event-processing/audit table keyed by Stripe event ID;
- structured payment logs with secret/personal-data redaction;
- monitoring for repeated webhook failures;
- reconciliation jobs for payments that succeeded externally but need local recovery;
- automated feature tests using mocked Stripe responses/events.

## Reporting a security issue

If this repository is used as a reference and you find a security issue, open a GitHub issue only when the report does not contain credentials or exploit-sensitive details. Sensitive reports should be sent privately to the repository owner.
