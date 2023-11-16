<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Shop\OrderProduct;
use App\Models\Shop\Balance;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index()
    {   
        $balance = Balance::first();
        $count = OrderProduct::where('status', '=', 'paid')->count();
        return view('admin.index', compact('count', 'balance'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'role_id' => 1,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return to_route('admin.index');
    }
}