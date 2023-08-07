<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


class ResetPasswordController extends Controller
{

        public function showResetForm(Request $request, $token)
        {
            return view('auth.passwords.reset')->with(['token' => $token, 'email' => $request->email]);
        }
        
        public function reset(Request $request)
        {
            $request->validate([
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed|min:8',
            ]);
        
            $response = $this->broker()->reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->save();
        
                    $user->setRememberToken(Str::random(60));
                }
            );
        
            return $response == Password::PASSWORD_RESET
                ? response()->json(['msg'=>trans($response)])
                : back()->withErrors(['email' => trans($response)]);
        }
        
        protected function broker()
        {
            return Password::broker();
        }
    }
