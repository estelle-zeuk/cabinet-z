<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * @param $driver
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider($driver)
    {
        $socialite =  Socialite::driver($driver)->redirect();

        return $socialite;
    }

    /**
     * @param $driver
     */
    public function handleProviderCallback($driver)
    {
        $user = Socialite::driver($driver)->user();

        // OAuth Two Providers
//        $token = $user->token;
//        $refreshToken = $user->refreshToken; // not always provided
//        $expiresIn = $user->expiresIn;

// OAuth One Providers
//        $token = $user->token;
//        $tokenSecret = $user->tokenSecret;

// All Providers
        $user->getId();
        $user->getNickname();
        $user->getName();
        $user->getEmail();
        $user->getAvatar();
        // $user->token;
    }
}
