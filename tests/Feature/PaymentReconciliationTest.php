<?php

namespace Tests\Feature;

use App\Http\Controllers\Shop\StripeController;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use ReflectionMethod;
use RuntimeException;
use Tests\TestCase;

class PaymentReconciliationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Schema::dropIfExists('order_products');
        Schema::dropIfExists('products');

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->unsignedInteger('product_quantity')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('order_quantity')->default(1);
            $table->string('status')->default('unpaid');
            $table->string('session_id')->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function test_a_paid_session_without_local_orders_is_not_acknowledged(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('no local order rows found');

        $this->invokeMarkSessionPaid('cs_missing');
    }

    public function test_replaying_payment_finalization_does_not_decrement_inventory_twice(): void
    {
        $productId = DB::table('products')->insertGetId([
            'product_name' => 'Test product',
            'product_quantity' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_products')->insert([
            'product_id' => $productId,
            'order_quantity' => 2,
            'status' => 'unpaid',
            'session_id' => 'cs_replay',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->invokeMarkSessionPaid('cs_replay');
        $this->invokeMarkSessionPaid('cs_replay');

        $this->assertSame(
            'paid',
            DB::table('order_products')->where('session_id', 'cs_replay')->value('status')
        );
        $this->assertSame(
            3,
            (int) DB::table('products')->where('id', $productId)->value('product_quantity')
        );
    }

    public function test_insufficient_inventory_rolls_back_the_order_transition(): void
    {
        $productId = DB::table('products')->insertGetId([
            'product_name' => 'Low-stock product',
            'product_quantity' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_products')->insert([
            'product_id' => $productId,
            'order_quantity' => 2,
            'status' => 'unpaid',
            'session_id' => 'cs_insufficient',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        try {
            $this->invokeMarkSessionPaid('cs_insufficient');
            $this->fail('Expected insufficient inventory to abort reconciliation.');
        } catch (RuntimeException $exception) {
            $this->assertStringContainsString('insufficient inventory', $exception->getMessage());
        }

        $this->assertSame(
            'unpaid',
            DB::table('order_products')->where('session_id', 'cs_insufficient')->value('status')
        );
        $this->assertSame(
            1,
            (int) DB::table('products')->where('id', $productId)->value('product_quantity')
        );
    }

    private function invokeMarkSessionPaid(string $sessionId): void
    {
        $controller = app(StripeController::class);
        $method = new ReflectionMethod($controller, 'markSessionPaid');
        $method->setAccessible(true);
        $method->invoke($controller, $sessionId);
    }
}
