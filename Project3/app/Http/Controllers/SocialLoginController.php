<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();
        $my_user    = User::where('email', '=', $socialUser->getEmail())->first();
        if ($my_user === null) {
            Auth::login(User::firstOrCreate([
                'email' => $socialUser->email,
                'name'  => $socialUser->name,
            ]));
        } else {
            Auth::login($my_user);
        }
        return redirect()->route('programming');
    }
}
