<?php

namespace App\Models\Slide;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
        protected $fillable = [
        'list_by',
        'slide_image',
        'promote_des',
        'catagory',
        'title',
        'subject',
        'title_color',
        'subject_color'
    ];

}