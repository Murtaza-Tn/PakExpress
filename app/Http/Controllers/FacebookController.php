<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Socialite;
use Exception;
use Auth;
class FacebookController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->stateless()->user();
            $existingUser = User::where('fb_id', $user->id)->first();

            if($existingUser){
                Auth::login($existingUser);
                return redirect('/home');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    // 'password' => encrypt('admin@123')
                ]);

                Auth::login($createUser);
                return redirect('/home');
            }

        } catch (\Throwable $th) {
          throw $th;
       }
    }
}
