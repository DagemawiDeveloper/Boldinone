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
        'session_id',
        'user_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
