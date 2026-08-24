<?php

namespace App\Models\Slide;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    // The legacy schema intentionally uses the singular table name. Declaring
    // it explicitly keeps existing installations and fresh migrations aligned.
    protected $table = 'slide';

    protected $fillable = [
        'list_by',
        'slide_image',
        'promote_des',
        'catagory',
        'title',
        'subject',
        'title_color',
        'subject_color',
    ];

    public function setPromoteDesAttribute(?string $value): void
    {
        $this->attributes['promoted_des'] = $value;
    }

    public function getPromoteDesAttribute(): ?string
    {
        return $this->attributes['promoted_des'] ?? null;
    }
}
