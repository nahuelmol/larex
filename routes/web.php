<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main', [MainController::class, 'message']);

Route::get('/login', function(){
    return view('Login');
});
