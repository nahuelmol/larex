<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AccountsController extends Controller {
    public function register(){
        return view('register');
    }
}
