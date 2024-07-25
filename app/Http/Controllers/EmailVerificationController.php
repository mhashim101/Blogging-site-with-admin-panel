<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EmailVerificationToken;

class EmailVerificationController extends Controller
{
    public function verify($token)
    {
        $verificationToken = EmailVerificationToken::where('token', $token)->first();

        if (!$verificationToken) {
            return redirect()->route('loginPage')->with('error', 'Invalid verification token.');
        }

        $user = $verificationToken->user;
        $user->email_verified_at = now();
        $user->save();

        $verificationToken->delete();

        return redirect()->route('loginPage')->with('status', 'Your email has been verified.');
    }
}
