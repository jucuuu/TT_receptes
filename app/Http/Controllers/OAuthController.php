<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Providers\RouteServiceProvider;

class OAuthController extends Controller
{
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function callback(): RedirectResponse
    {
        $oAuthUser = Socialite::driver('twitter')->user();
 
        $user = User::updateOrCreate([
            'twitter_id' => $oAuthUser->getId(),
        ], [
            'name' => $oAuthUser->getName(),
            'username' => $oAuthUser->getName(),
            'email' => $oAuthUser->getEmail(),
            'password' => Hash::make(Str::random(50)),
            'avatar_url' => $oAuthUser->getAvatar(),
            'twitter_token' => $oAuthUser->token,
            'twitter_refresh_token' => $oAuthUser->refreshToken,
        ]);
 
        Auth::login($user);
 
        return redirect(RouteServiceProvider::HOME)->with('message', 'Profile created.');
    }
}
