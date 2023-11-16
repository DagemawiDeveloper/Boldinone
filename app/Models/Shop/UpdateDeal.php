<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateDeal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_deal',
    ];
}