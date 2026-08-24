<?php

namespace Tests\Support;

use App\Models\Role;
use App\Models\Shop\OrderProduct;
use App\Models\Shop\Product;
use App\Models\User;
use Illuminate\Support\Str;

trait CreatesCommerceData
{
    protected function createProduct(array $overrides = []): Product
    {
        return Product::query()->create(array_merge([
            'product_name' => 'Test product',
            'product_catagories' => 'general',
            'product_description' => 'A product created by the payment test suite.',
            'product_list_by' => 'default',
            'product_price' => 100.00,
            'product_discount' => 0,
            'product_logical_price' => 100.00,
            'product_brand' => 'Boldinone',
            'product_quantity' => 10,
            'product_available' => true,
        ], $overrides));
    }

    protected function createCustomer(array $overrides = []): User
    {
        $role = Role::query()->firstOrCreate(['role_name' => 'customers']);

        return User::query()->create(array_merge([
            'role_id' => $role->id,
            'name' => 'Dagi',
            'lastname' => 'Tester',
            'address' => 'Addis Ababa',
            'email' => 'dagi+' . Str::lower(Str::random(8)) . '@example.com',
            'email_verified_at' => now(),
            'password' => 'password-for-tests',
        ], $overrides));
    }

    protected function createOrder(Product $product, array $overrides = []): OrderProduct
    {
        $quantity = (int) ($overrides['order_quantity'] ?? 1);
        $price = (float) ($overrides['each_price'] ?? $product->product_logical_price);

        return OrderProduct::query()->create(array_merge([
            'product_id' => $product->id,
            'user_id' => 1,
            'product_name' => $product->product_name,
            'order_quantity' => $quantity,
            'firstname' => 'Dagi',
            'lastname' => 'Tester',
            'email' => 'dagi@example.com',
            'address' => 'Addis Ababa',
            'status' => 'unpaid',
            'each_price' => $price,
            'total_price' => round($price * $quantity, 2),
            'checkout_reference' => (string) Str::uuid(),
            'session_id' => 'cs_test_' . Str::lower(Str::random(12)),
        ], $overrides));
    }
}
