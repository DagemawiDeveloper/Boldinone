<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_name',
        'service_catagories',
        'service_description',
        'service_list_by',
        'main_image',
        'banner_image'
    ];

}