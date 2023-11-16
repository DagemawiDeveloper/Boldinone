<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_catagories');
            $table->string('product_description');
            $table->string('product_list_by');
            $table->string('main_image')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('product_price');
            $table->double('product_discount')->nullable();
            $table->string('product_brand');
            $table->string('product_quantity');
            $table->string('product_available');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};