<?php

namespace Tests\Feature\Payments;

use App\Models\Shop\OrderProduct;
use App\Services\Payments\StripeCheckoutGateway;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use RuntimeException;
use Stripe\Checkout\Session;
use Tests\Support\CreatesCommerceData;
use Tests\TestCase;

class CheckoutControllerTest extends TestCase
{
    use CreatesCommerceData;
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_local_checkout_rows_exist_before_stripe_is_called(): void
    {
        $customer = $this->createCustomer();
        $product = $this->createProduct([
            'product_price' => 150.00,
            'product_logical_price' => 125.00,
            'product_quantity' => 8,
        ]);
        $stripeSession = Session::constructFrom([
            'id' => 'cs_test_durable_checkout',
            'url' => 'https://checkout.stripe.test/session/durable',
        ]);

        $gateway = Mockery::mock(StripeCheckoutGateway::class);
        $gateway->shouldReceive('createCheckoutSession')
            ->once()
            ->withArgs(function (array $parameters, string $idempotencyKey) use ($customer, $product): bool {
                $pending = OrderProduct::query()
                    ->where('user_id', $customer->id)
                    ->where('product_id', $product->id)
                    ->where('status', 'checkout_pending')
                    ->first();

                self::assertNotNull($pending, 'Local checkout rows must exist before Stripe is called.');
                self::assertStringStartsWith('pending:', $pending->session_id);
                self::assertSame('125.00', (string) $pending->each_price);
                self::assertSame(2, (int) $pending->order_quantity);
                self::assertSame(250.00, (float) $pending->total_price);
                self::assertSame(12500, $parameters['line_items'][0]['price_data']['unit_amount']);
                self::assertSame((string) $customer->id, $parameters['metadata']['user_id']);
                self::assertSame($pending->checkout_reference, $parameters['metadata']['checkout_reference']);
                self::assertSame(
                    'boldinone-checkout-' . $pending->checkout_reference,
                    $idempotencyKey
                );

                return true;
            })
            ->andReturn($stripeSession);

        $this->app->instance(StripeCheckoutGateway::class, $gateway);

        $response = $this
            ->actingAs($customer)
            ->withSession([
                'cart' => [
                    $product->id => [
                        'quantity' => 2,
                        // Deliberately wrong: the controller must ignore it.
                        'price' => 0.01,
                    ],
                ],
            ])
            ->post(route('customers.session'));

        $response->assertRedirect('https://checkout.stripe.test/session/durable');
        $this->assertDatabaseHas('order_products', [
            'user_id' => $customer->id,
            'product_id' => $product->id,
            'session_id' => 'cs_test_durable_checkout',
            'status' => 'unpaid',
            'order_quantity' => 2,
        ]);
    }

    public function test_failed_stripe_creation_leaves_an_auditable_local_checkout(): void
    {
        $customer = $this->createCustomer();
        $product = $this->createProduct();

        $gateway = Mockery::mock(StripeCheckoutGateway::class);
        $gateway->shouldReceive('createCheckoutSession')
            ->once()
            ->andThrow(new RuntimeException('Stripe sandbox unavailable.'));

        $this->app->instance(StripeCheckoutGateway::class, $gateway);

        $response = $this
            ->from(route('shop'))
            ->actingAs($customer)
            ->withSession([
                'cart' => [
                    $product->id => ['quantity' => 1],
                ],
            ])
            ->post(route('customers.session'));

        $response->assertRedirect(route('shop'));
        $response->assertSessionHas(
            'message',
            'Checkout could not be started. No payment was taken; please try again.'
        );
        $this->assertDatabaseHas('order_products', [
            'user_id' => $customer->id,
            'product_id' => $product->id,
            'status' => 'checkout_failed',
        ]);
    }
}
