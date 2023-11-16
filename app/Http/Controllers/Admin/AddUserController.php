<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Inviteuser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\Shop\OrderProduct;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;


class AddUserController extends Controller
{

        public function index()
        {
            $users = User::all();
            $count = OrderProduct::where('status', '=', 'paid')->count();
            return view('admin.adduser.index', [
                'users' => $users,
                'count' => $count
            ]);
        }

        public function create()
        {
            return view('admin.adduser.create');
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'role_id' => 2,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return to_route('admin.index');
        }

        public function invite_view()
        {
            return view('admin.adduser.invite');
        }

        public function invite(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users,email'
            ]);
            $validator->after(function ($validator) use ($request) {
                if (Inviteuser::where('email', $request->input('email'))->exists()) {
                    $validator->errors()->add('email', 'There exists an invite with this email!');
                }
            });
            if ($validator->fails()) {
                return redirect(route('admin.adduser.index'))
                    ->withErrors($validator)
                    ->withInput();
            }
            do {
                $token = Str::random(20);
            } while (Inviteuser::where('token', $token)->first());
                Inviteuser::create([
                    'token' => $token,
                    'email' => $request->input('email')
                ]);
            $url = URL::temporarySignedRoute(
        
                'registration', now()->addMinutes(300), ['token' => $token]
            );
        
            return redirect('/admin.adduser.index')->with('success', 'The Invite has been sent successfully');
        }
        
}