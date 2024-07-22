<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {

        $googleUser = Socialite::driver('google')->user();
        // Find or create the user in your database
        $findUser = User::where('google_id', $googleUser->id)->first();

        if ($findUser) {
            Auth::login($findUser);
        } else {
            $newUser = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'password' => encrypt('123456dummy')
            ]);

            Auth::login($newUser);
        }

        return redirect()->intended('dashboard');

    }
}
