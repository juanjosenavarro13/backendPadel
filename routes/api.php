<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PistaController;


Route::get('/login', function () {
    return response()->json("error login", 401);
})->name('login');


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

Route::prefix('config')->group(function () {
    Route::get('/get', [ConfigurationController::class, 'index']);
});

Route::prefix('rol')->group(function () {
    Route::get('/getRolById/{id}', [RolController::class, 'getRolById']);
});

Route::prefix('pistas')->group(function () {
    Route::get('/getPistas', [PistaController::class, 'getPistas']);
});

Route::prefix('partidos')->group(function () {
    Route::get('/byDate/{fecha}', [PartidoController::class, 'getPartidosByDate']);
});
