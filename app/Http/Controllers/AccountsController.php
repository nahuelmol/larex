<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AccountsController extends Controller {
    public function register(){
        return view('register');
    }
    public function login(){
        return view('login');
    }
    public function logout(){
        return view('logout');
    }
}
