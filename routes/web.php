<?php
  
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
 * message function just return a text message in text/plain
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'message']);
