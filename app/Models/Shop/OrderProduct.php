<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_name',
        'order_quantity',
        'firstname',
        'lastname',
        'email',
        'address',
        'status',
        'each_price',
        'total_price',
        'checkout_reference',
        'session_id',
        'user_id',
    ];

    protected $casts = [
        'product_id' => 'integer',
        'user_id' => 'integer',
        'order_quantity' => 'integer',
        'each_price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
