<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inviteuser extends Model
{
    use HasFactory;
    protected $fillable=[
      'email',
      'token'
    ];
}