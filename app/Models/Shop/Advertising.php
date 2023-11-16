<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    use HasFactory;
    protected $fillable = [
        'list_by',
        'ads_image',
        'promoted_des',
        'catagory',
        'title',
        'subject',
        'title_color',
        'subject_color'
    ];
}