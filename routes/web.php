<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccountsController;

use App\Http\Controllers\UserStoring;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calculator', [MainController::class, 'message'])->name('calculator');
Route::get('/register', [AccountsController::class, 'register'])->name('register');
Route::get('/login', function(){
    return view('Login');
})->name('login');


Route::get('/aboutus', [AboutController::class, 'response'])->name('aboutus');

Route::post('/adduser', [UserStoring::class, 'store'])->name('adduser');
