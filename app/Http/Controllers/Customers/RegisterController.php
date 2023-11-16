<?php

namespace App\Http\Controllers\Customers;

use App\Models\User;
use App\Models\Settings;
use App\Models\Catagories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;



class RegisterController extends Controller
{
    public function create(){
        $catagories = Catagories::get();
        $setting = Settings::first();
        $selected_menu = Catagories::where('is_menu','=','1')->get();
        return view('register-client', compact('catagories', 'setting', 'selected_menu'));
    }

    // public function store(Request $request)
    // {
    //     $user = new User();
        
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $user->role_id = '3';


    //     $user->save();

    //     return back()->with('success', 'Registered');
    // }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'lastname'=>$request->lastname,
            'address'=> $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => '6'
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}