<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use \Symfony\Component\HttpFoundation\RedirectResponse;

class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();
        $my_user = User::where('email', '=', $socialUser->getEmail())->first();
        if ($my_user === null) {
            Auth::login(User::firstOrCreate([
                'email' => $socialUser->email,
                'name' => $socialUser->user->given_name,
            ]));
        } else {
            Auth::login($my_user);
        }
           return redirect()->route('programming');
    }
}
