<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccountsController;

use App\Http\Controllers\UserStoring;
use App\Http\Controllers\Folder;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FoldersStoring;

Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/calculator', [MainController::class, 'calculator'])->name('calculator');

Route::get('/aboutus', [AboutController::class, 'response'])->name('aboutus');

//views
Route::get('/login', [AccountsController::class, 'login'])->name('login');
Route::get('/register', [AccountsController::class, 'register'])->name('register');
//APIs
Route::post('/auth-user', [LoginController::class, 'login'])->name('authuser');
Route::post('/reg-user', [RegisterController::class, 'register'])->name('reguser');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

//view
Route::get('/form-folder', [Folder::class, 'create'])->name('formfolder');
//APIs
Route::post('/create-folder', [FoldersStoring::class, 'create'])->name('createfolder');
Route::post('/delete-folder', [FoldersStoring::class, 'delete'])->name('deletefolder');
Route::post('/edit-folder',   [FoldersStoring::class, 'edit'])->name('editfolder');

