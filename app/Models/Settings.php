<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
        protected $fillable = [
        'webname',
        'email',
        'address1',
        'address2',
        'phone',
        'about',
        'currency',
        'deals_background',
        'right_advert',
        'left_advert',
        'right_advert_des',
        'left_advert_des',
        'right_advert_target',
        'left_advert_target',
        'feature_right_advert',
        'feature_right_des',
        'feature_right_target',
        'feature_left_advert',
        'feature_left_des',
        'feature_left_target',
        'big_banner_feature'
    ];
}