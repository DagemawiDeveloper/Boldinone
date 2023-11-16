<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['role_name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    
    public function permissions(){
        return $this->belongsToMany(Permission::class);
        
    }

    public function hasPermission($permission_name) : bool {
        return $this->permissions()->where('permission_name',$permission_name)->exists();
    }
}