<?php
namespace App\Http\Controllers\OAuth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller {
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handlerGoogleCredentials()
    {
        $user = Socialite::driver('google')->user();
        echo $user->name;
        echo $user->email;
        /*$existent_user = User::where('email', $user->email)->first();

        if(existent_user){
            auth()->login($existent_user);
        } else {
            $new_user = new User();
        }*/
    }
    
    //for facebook
    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handlerFacebookCredentials()
    {
        Socialite::driver('facebook')->user();
    }
    
    //for twitter
    public function redirectTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handlerTwitterCredentials()
    {
        Socialite::driver('twitter')->user();
    }
}

