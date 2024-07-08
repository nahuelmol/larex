<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller {
    public function calculator(){
        return view('calculator');
    }
    public function home(Request $request){
        $email_session = session('email');
        $token_session = session('token');
        $data = [];
        if($token_session != null){
            $data = [
                'token' => $token_session,
                'email' => $email_session,
            ];
        }
        return view('home', ['data' => $data]);
    }
}
