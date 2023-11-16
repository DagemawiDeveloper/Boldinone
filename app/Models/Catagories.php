<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagories extends Model
{
    use HasFactory;
        protected $fillable = 
        [
        'catagory_id',
        'catagory_name',
        'catagory_image',
        'service_list_by',
        'ad_banner',
        'is_featured',  
        ];
    public function parent()
    {
     return $this->belongsTo(Catagories::class,'catagory_id');    
    }

}