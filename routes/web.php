<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccountsController;

use App\Http\Controllers\UserStoring;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/calculator', [MainController::class, 'calculator'])->name('calculator');

Route::get('/register', [AccountsController::class, 'register'])->name('register');
Route::get('/login',    [AccountsController::class, 'login'])->name('login');
Route::get('/logout',   [AccountsController::class, 'logout'])->name('logout');

Route::get('/aboutus', [AboutController::class, 'response'])->name('aboutus');

Route::post('/delete-user', [UserStoring::class, 'delete'])->name('deleteuser');
Route::post('/edit-user',   [UserStoring::class, 'edit'])->name('edituser');

Route::post('/auth-user', [LoginController::class, 'login'])->name('authuser');
Route::post('/reg-user', [RegisterController::class, 'register'])->name('reguser');
Route::get('/logout', [LogoutController::class, 'logout'])->name('outuser');
