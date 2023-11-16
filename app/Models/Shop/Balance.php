<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;
        protected $fillable = [
         'available_amount',
         'available_currency',
         'available_card',
         'pending_amount',
         'pending_currency',
         'pending_card',
        ];
}