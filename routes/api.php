<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ThemeController;





Route::group(['middleware' => 'api'], function ($router) {
    Route::prefix('auth')->group(function () {
        Route::post('/login', [UsuarioController::class, 'login']);
        Route::post('/register', [UsuarioController::class, 'register']);
        Route::post('/logout', [UsuarioController::class, 'logout']);
        Route::post('/refresh', [UsuarioController::class, 'refresh']);
        Route::post('/me', [UsuarioController::class, 'me']);
    });
});

Route::prefix('themes')->group(function () {
    Route::get('/getThemes', [ThemeController::class, 'getThemes']);
});
