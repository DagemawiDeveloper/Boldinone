<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterCatagories extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {
        if($filters['cata'] ?? false) {
            $query->where('cata', 'like', '%' . request('cata') . '%');
        }
    }
}