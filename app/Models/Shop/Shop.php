<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
        protected $fillable = [
        'product_name',
        'product_catagories',
        'product_description',
        'product_list_by',
        'main_image',
        'banner_image',
        'product_price'
    ];
}