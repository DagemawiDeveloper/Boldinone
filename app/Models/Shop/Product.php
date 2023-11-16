<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
        protected $fillable = [
        'product_name',
        'product_catagories',
        'product_description',
        'product_specification',
        'product_long_description',
        'product_list_by',
        'product_price',
        'product_discount',
        'product_brand',
        'product_quantity',
        'product_available',
        'product_trending',
        'plan_id',
        'is_deal',
        'is_featured',
        // 'deal_target',
        'main_image',
        'big_image',
        'big_image1',
        'big_image2',

        
    ];

}