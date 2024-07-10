<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AccountsController extends Controller {
    public function register(){
        return view('register');
    }
    public function login(){
        return view('login');
    }
}
