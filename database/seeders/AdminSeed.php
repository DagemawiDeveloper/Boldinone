<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRole = Role::create(['role_name' => 'user']);
        $adminRole = Role::create(['role_name' => 'admin']);
        User::create([
            'role_id' => $adminRole->id,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            // 'email_verfied_at' => now(), 
            'password' => bcrypt('password'),
            
        ]);
    }
}