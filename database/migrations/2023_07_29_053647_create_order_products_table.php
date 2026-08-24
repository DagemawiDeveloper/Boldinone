<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('product_name');
            $table->unsignedInteger('order_quantity');
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('email');
            $table->string('address')->nullable();
            $table->string('status', 40)->default('checkout_pending')->index();
            $table->decimal('each_price', 12, 2);
            $table->decimal('total_price', 12, 2);
            $table->uuid('checkout_reference')->index();
            $table->string('session_id')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
