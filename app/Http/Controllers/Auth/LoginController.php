<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

use Kreait\Firebase\Auth\SignIn\FailedToSignIn;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Exception\InvalidArgumentException;
use Firebase\Auth\Token\Verifier;

class LoginController extends Controller {
    protected $firebaseAuth;
    public function __construct(){
        $this->firebaseAuth = Firebase::auth();
    }
    public function login(Request $request){
        //the generate token is stored in the laravel_session cookie
        $email = $request->input('email');
        $pass = $request->input('password');
        try{
            session()->flush();
            $result = $this->firebaseAuth->signInWithEmailAndPassword($email, $pass);
            $idToken = $result->idToken();
            $user = $result->data();
            $CSRFtoken = $request->input('_token');;
            session(['token' => $idToken]);
            session(['CSRFtoken' => $CSRFtoken]);
            session(['email' => $email]);
            return redirect()->route('home');
        } catch(FailedToSignIn $e){
            session('CSRFtoken')->forget();
            $message = [
                'error' => 'Failed to sign in: '.$e->getMessage(),
            ];
            return redirect()->route('login')->withErrors($message);
        }
   }
}
