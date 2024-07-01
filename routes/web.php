<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calculator', [MainController::class, 'message'])->name('calculator');

Route::get('/login', function(){
    return view('Login');
})->name('login');


Route::get('/aboutus', [AboutController::class, 'response'])->name('aboutus');
