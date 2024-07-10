<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;
use Kreait\Laravel\Firebase\Facades\Firebase;

class VerifyFirebaseToken {
    private $firebaseAuth;
    public function __construct(){
        $this->firebaseAuth = Firebase::auth();
    }
    public function handle(Request $request, Closure $next): Response {
        $idToken = session('token');
        if(!$idToken){
            $message = [
                'error' => 'token is null',
            ];
            return redirect('/login')->withErrors($message);
        }
        try{
            $verifiedToken = $this->firebaseAuth->verifyIdToken($idToken);
            session(['token' => $idToken]);
            return redirect()->route('home');
        }catch(FailedToVerifyToken $e){
            session()->forget('token');
            $message = [
                'error' => 'error -> '.$e->getMessage(),
            ];
            return redirect()->route('login')->withErrors($message);
        }
        return $next($request);
    }
}
