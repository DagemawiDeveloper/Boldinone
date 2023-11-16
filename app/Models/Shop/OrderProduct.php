<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
        protected $fillable = [
        'id',
        'product_name',
        'quantity',
        'firstname',
        'lastname',
        'email',
        'address',
        // 'card_holder',
        'status',
        'each_price',
        'total_price',
        'session_id'
        ];
    public function product(){
        return 	$this->hasMany(Product::class);
    }
}