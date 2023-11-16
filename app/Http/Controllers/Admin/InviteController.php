<?php

namespace App\Http\Controllers\admin;

use App\Models\Inviteuser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class InviteController extends Controller
{

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