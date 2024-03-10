<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller {
    public function message(){
        return response('hello from home', 200)
            ->header('Content-Type', 'text/plain');
    }
}
