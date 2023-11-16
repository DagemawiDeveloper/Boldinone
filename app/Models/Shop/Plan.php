<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
        protected $fillable = [
        'plan_name',
        'plan_target_date',
        'plan_start_date',
        ];
}