<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationController extends Controller
{
    // Show the email verification notice
    public function showNotice()
    {
        return view('modals.email_verification_notice');
    }

    // Mark the user's email as verified
    public function verify(Request $request,$user_id,$hash) {
        if (!$request->hasValidSignature()) {
            return response()->json(["msg" => "Invalid/Expired url provided."], 401);
        }
    
        $user = User::findOrFail($user_id);
    
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }
    
        return response()->json(['msg'=>'email verified']);
    }

    // Resend the email verification link
    public function resend($uid)
    {
        $user = User::find($uid);

        if ($user->email_verified_at != "") {
            return response()->json(['error' => 'Your email is already verified.'],400);
        }

        $user->sendEmailVerificationNotification();

        return response()->json(['success' => 'A fresh verification link has been sent to your email address.']);
    }
}
