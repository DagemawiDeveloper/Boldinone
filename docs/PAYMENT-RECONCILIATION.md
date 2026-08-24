# Stripe Payment Reconciliation

Payment integrations fail across two systems: the application database and the payment provider. This document describes the states that must remain recoverable when one side succeeds and the other side does not.

## Invariants

1. A customer must not be sent to a payable Stripe Checkout Session unless the application has durable local order rows for that session.
2. A Stripe event is acknowledged with HTTP 2xx only after its local state transition succeeds or is proven to have succeeded previously.
3. Finalization is idempotent: browser redirects and repeated webhooks may race, but inventory is decremented once.
4. Product and order rows are locked inside the same database transaction.
5. Missing orders, products, or inventory are reconciliation failures—not silent success conditions.

## Failure matrix

| Failure | Application response | Operator action |
|---|---|---|
| Stripe Session creation fails | No local order is created; customer receives an error | Inspect provider/API logs and retry |
| Stripe Session created, local order persistence fails | Attempt to expire the open Stripe Session; report both persistence and cleanup failures | Confirm session is expired; reconcile manually if provider cleanup failed |
| Customer pays, local order exists | Lock rows, transition unpaid lines to paid once, decrement stock once | No action unless monitoring reports failure |
| Duplicate success redirect or webhook | Paid rows are skipped inside the transaction | No action |
| Paid Stripe Session has no local order | Throw and return non-2xx so Stripe retries | Locate the session, customer, and provider payment; create/recover the missing order or refund |
| Product disappeared before finalization | Roll back and return non-2xx | Restore/re-map the product, reconcile inventory, or refund |
| Inventory is insufficient at finalization | Roll back and return non-2xx | Investigate oversell; replenish/reserve inventory or refund |
| Remote Checkout Session could not be expired | Original order-creation failure remains visible and cleanup failure is reported | Expire it in Stripe Dashboard/API before it can be paid |

## Idempotent finalization

Both the browser success endpoint and Stripe webhook call the same finalization method. It:

1. selects all local order lines by Checkout Session ID;
2. locks those rows;
3. fails if the local order does not exist;
4. skips rows already marked paid;
5. locks each product row;
6. validates stock;
7. marks the order paid and decrements inventory in one transaction.

If any line fails, the transaction rolls back and Stripe receives a retriable failure from the webhook path.

## Monitoring fields

Production logs should include structured, non-secret identifiers:

- Stripe event ID;
- Checkout Session ID;
- local order IDs;
- authenticated user/customer ID where available;
- reconciliation result;
- exception class and safe error code;
- correlation/request ID.

Do not log API keys, webhook secrets, complete card/customer payloads, or unnecessary personal information.

## Recommended next production layer

For a larger deployment, add a dedicated `payment_events` ledger with a unique provider event ID, processing status, attempts, last error, and timestamps. That supports provider-level event replay, dashboards, alerting, and manual reconciliation without depending only on order status.
