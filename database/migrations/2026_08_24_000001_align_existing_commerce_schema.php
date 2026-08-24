<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('users')) {
            if (! Schema::hasColumn('users', 'lastname')) {
                Schema::table('users', fn (Blueprint $table) => $table->string('lastname')->nullable()->after('name'));
            }

            if (! Schema::hasColumn('users', 'address')) {
                Schema::table('users', fn (Blueprint $table) => $table->string('address')->nullable()->after('lastname'));
            }
        }

        if (Schema::hasTable('products')) {
            $this->addProductColumns();
        }

        if (Schema::hasTable('order_products')) {
            $this->addOrderColumns();
        }
    }

    public function down(): void
    {
        // This migration repairs legacy installations. Its columns may already
        // contain application data, so rollback intentionally preserves them.
    }

    private function addProductColumns(): void
    {
        $columns = [
            'product_specification' => fn (Blueprint $table) => $table->text('product_specification')->nullable(),
            'product_long_description' => fn (Blueprint $table) => $table->longText('product_long_description')->nullable(),
            'big_image' => fn (Blueprint $table) => $table->string('big_image')->nullable(),
            'big_image1' => fn (Blueprint $table) => $table->string('big_image1')->nullable(),
            'big_image2' => fn (Blueprint $table) => $table->string('big_image2')->nullable(),
            'product_logical_price' => fn (Blueprint $table) => $table->decimal('product_logical_price', 12, 2)->nullable(),
            'product_trending' => fn (Blueprint $table) => $table->boolean('product_trending')->default(false),
            'plan_id' => fn (Blueprint $table) => $table->unsignedBigInteger('plan_id')->nullable(),
            'is_deal' => fn (Blueprint $table) => $table->boolean('is_deal')->default(false),
            'is_featured' => fn (Blueprint $table) => $table->boolean('is_featured')->default(false),
            'deal_name' => fn (Blueprint $table) => $table->string('deal_name')->nullable(),
            'deal_target' => fn (Blueprint $table) => $table->date('deal_target')->nullable(),
            'deal_index' => fn (Blueprint $table) => $table->boolean('deal_index')->default(false),
        ];

        foreach ($columns as $name => $definition) {
            if (! Schema::hasColumn('products', $name)) {
                Schema::table('products', $definition);
            }
        }
    }

    private function addOrderColumns(): void
    {
        $columns = [
            'product_id' => fn (Blueprint $table) => $table->unsignedBigInteger('product_id')->nullable(),
            'user_id' => fn (Blueprint $table) => $table->unsignedBigInteger('user_id')->nullable(),
            'product_name' => fn (Blueprint $table) => $table->string('product_name')->nullable(),
            'order_quantity' => fn (Blueprint $table) => $table->unsignedInteger('order_quantity')->nullable(),
            'checkout_reference' => fn (Blueprint $table) => $table->uuid('checkout_reference')->nullable(),
        ];

        foreach ($columns as $name => $definition) {
            if (! Schema::hasColumn('order_products', $name)) {
                Schema::table('order_products', $definition);
            }
        }

        Schema::table('order_products', function (Blueprint $table) {
            $table->index('product_id', 'order_products_product_id_index');
            $table->index('user_id', 'order_products_user_id_index');
            $table->index('checkout_reference', 'order_products_checkout_reference_index');
        });
    }
};
