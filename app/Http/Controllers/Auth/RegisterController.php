<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Kreait\Firebase\Auth\SignIn\FailedToSignIn;
use Kreait\Laravel\Firebase\Facades\Firebase;


class RegisterController extends Controller {
    private $firebaseAuth;
    public function __construct(){
        $this->firebaseAuth = Firebase::auth();
    }
    public function register(Request $request){
        $email = $request->input('email');
        $pass = $request->input('password');
        try {
            if(($email == null) or ($pass == null)){
                return redirect()->route('register');
            }
            $result = $this->firebaseAuth->createUserWithEmailAndPassword($email, $pass);
            $user = $result->data();
            $token = $request->input('_token');
            session(['token' => $token]);
            session(['email' => $email]);
            Session::flash('success', 'Registration succesfull');
            return redirect()->route('register');
        } catch(FailedToSignIn $e){
            Session::flash('error', 'retry');
            return redirect()->route('register')->withErrors(['error' => 'Registration failed'.$e->getMessage()]);
        }
    }
}
