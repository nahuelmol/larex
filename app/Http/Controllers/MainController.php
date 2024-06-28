<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class MainController extends Controller {
    public function message(){
        return view('main');
    }
}
