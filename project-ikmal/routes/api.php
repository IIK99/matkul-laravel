<?php

use App\Http\Controllers\api\UserController;
use App\Http\Controllers\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AdminAuthController::class, 'apiLogin'])->name('admin.loginApi');
Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::get('/user-list', [UserController::class, 'getUsers'])->name('users.list');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logoutApi');
});