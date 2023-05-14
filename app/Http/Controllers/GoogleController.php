<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Exception;

class GoogleController extends Controller
{
    public function googlepage()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googlecallback ()
    {





        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser)

            {

                Auth::login($finduser);


                if ($finduser == '1')
                {
                    return redirect()->intended('admin.home');

                }
                else {
                    return redirect()->intended('redirect');

                }


            }

            else

            {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                Auth::login($newUser);

                if ($finduser == '1')
                {
                    return redirect()->intended('admin.home');

                }
                else {
                    return redirect()->intended('redirect');

                }
            }

        }
        catch (Exception $e) {
            dd($e->getMessage());
        }

    }



    public function facebookpage()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookcallback ()
    {


        try {

            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('facebook_id', $user->id)->first();

            if($finduser)

            {

                Auth::login($finduser);

                if ($finduser == '1')
                {
                    return redirect()->intended('admin.home');

                }
                else {
                    return redirect()->intended('redirect');

                }

            }

            else

            {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                Auth::login($newUser);

                if ($finduser == '1')
                {
                    return redirect()->intended('admin.home');

                }
                else {
                    return redirect()->intended('redirect');

                }
            }

        }
        catch (Exception $e) {
            dd($e->getMessage());
        }

    }
}
