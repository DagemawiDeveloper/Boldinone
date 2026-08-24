<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_catagories');
            $table->text('product_description');
            $table->text('product_specification')->nullable();
            $table->longText('product_long_description')->nullable();
            $table->string('product_list_by');
            $table->string('main_image')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('big_image')->nullable();
            $table->string('big_image1')->nullable();
            $table->string('big_image2')->nullable();
            $table->decimal('product_price', 12, 2);
            $table->decimal('product_discount', 5, 2)->nullable();
            $table->decimal('product_logical_price', 12, 2);
            $table->string('product_brand');
            $table->unsignedInteger('product_quantity');
            $table->boolean('product_available')->default(true);
            $table->boolean('product_trending')->default(false);
            $table->unsignedBigInteger('plan_id')->nullable()->index();
            $table->boolean('is_deal')->default(false)->index();
            $table->boolean('is_featured')->default(false)->index();
            $table->string('deal_name')->nullable();
            $table->date('deal_target')->nullable();
            $table->boolean('deal_index')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
