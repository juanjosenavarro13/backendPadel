<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;





Route::group(['middleware' => 'api'], function ($router) {
    Route::post('/auth/login', [UsuarioController::class, 'login']);
    Route::post('/auth/register', [UsuarioController::class, 'register']);
    Route::post('/auth/logout', [UsuarioController::class, 'logout']);
    Route::post('/auth/refresh', [UsuarioController::class, 'refresh']);
    Route::post('/auth/me', [UsuarioController::class, 'me']);
});
