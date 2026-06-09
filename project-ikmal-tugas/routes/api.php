<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AdminAuthController::class, 'apiLogin']);
Route::post('/register', [AdminAuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AdminAuthController::class, 'apiLogout']);
    Route::apiResource('menus', MenuController::class)->names('api.menus');
    Route::apiResource('users', UserController::class)->names('api.users');
});
