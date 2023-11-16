<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
        protected $fillable = [
        'product_name',
        'user_id',
        'rateing',
        'review',

        
    ];
}
