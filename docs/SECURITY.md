# Security Notes

Boldinone integrates authentication, role-based administration and Stripe payments. This document records the security boundaries that matter most when running or extending the project.

## Secrets

Payment and application secrets must be supplied through environment variables and must never be committed to Git.

```dotenv
APP_KEY=
STRIPE_KEY=pk_test_...
STRIPE_SECRET=sk_test_...
STRIPE_WEBHOOK_KEY=whsec_...
```

For production deployments, use the hosting platform's secret manager or protected environment configuration rather than storing secrets in deployment scripts.

## Stripe webhooks

Stripe webhook requests must be verified using the raw request payload, the `Stripe-Signature` header and the endpoint signing secret. A webhook should be rejected when signature verification fails.

Payment providers retry events, so webhook handling should also be idempotent. A production-hardening pass should ensure an already-processed Stripe event cannot decrement inventory or apply another payment-state transition twice.

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

The application uses Stripe Checkout so raw card numbers should never pass through or be stored by this Laravel application. Persist only the provider identifiers and business data needed for reconciliation.

## Session cart

The shopping cart is session-backed. Product price and stock should always be revalidated server-side before final order/payment creation; browser or session values should not be treated as authoritative financial data.

## Database integrity

Payment-state changes and inventory mutations are closely related business operations. For production use they should be performed transactionally where possible, with retry-safe logic and audit records.

## Reporting a security issue

If this repository is used as a reference and you find a security issue, open a GitHub issue only when the report does not contain credentials or exploit-sensitive details. Sensitive reports should be sent privately to the repository owner.
