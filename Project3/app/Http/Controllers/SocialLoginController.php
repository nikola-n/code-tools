<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public  function  redirect($provider): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    public  function  callback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();
        dd($socialUser);
       $user = User::create([
           'email'=>$socialUser->email,
           'name'=>$socialUser->name || 'some name',
       ]);
      auth()->login($user);
    return view('user.dashboard',compact('user'));
    }

}

