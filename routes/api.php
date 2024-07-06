<?php

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Oauth\LoginController;
use App\Http\Controllers;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('oauth')->group(function(){
    Route::group(['middleware' => ['web']], function(){
        Route::get('/google', [LoginController::class, 'redirectGoogle']);
        Route::get('/google/callback', [LoginController::class, 'handlerGoogleCredentials']);

        Route::get('/facebook', [LoginController::class, 'redirectFacebook']);
        Route::get('/facebook/callback', [LoginController::class, 'handlerFacebookCredentials']);

        Route::get('/twitter', [LoginController::class, 'redirectTwitter']);
        Route::get('/twitter/callback', [LoginController::class, 'handlerTwitterCredentials']);
    });

});

