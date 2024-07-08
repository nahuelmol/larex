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
            $result = $this->firebaseAuth->signInWithEmailAndPassword($email, $pass);
            $user = $result->data();
            Session::flash('sucess', 'user logged');
            $token = $request->input('_token');
            session(['token' => $token]);
            session(['email' => $email]);
            return redirect('/');
        } catch(FailedToSignIn $e){
            Session::flash('error', 'Login failed');
            return redirect('/login')->withErrors(['error' => 'Failed to sign in.'.$e->getMessage()]);
        }
   }
}
