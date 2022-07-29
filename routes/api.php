<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;





Route::group(['middleware' => 'api'], function ($router) {
    Route::post('/usuario/login', [UsuarioController::class, 'login']);
    Route::post('/usuario/register', [UsuarioController::class, 'register']);
    Route::post('/usuario/logout', [UsuarioController::class, 'logout']);
    Route::post('/usuario/refresh', [UsuarioController::class, 'refresh']);
    Route::post('/usuario/me', [UsuarioController::class, 'me']);
});
