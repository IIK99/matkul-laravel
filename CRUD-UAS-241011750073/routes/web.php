<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasienController;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/data-pasien', [FrontendController::class, 'dataPasien'])->name('data-pasien');
Route::get('/data-pasien/{id}', [FrontendController::class, 'show'])->name('data-pasien.show');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/pasien/export-pdf', [PasienController::class, 'exportPdf'])->name('pasien.export-pdf');
    Route::get('/pasien/{id}/export-pdf-single', [PasienController::class, 'exportPdfSingle'])->name('pasien.export-pdf-single');
    Route::resource('pasien', PasienController::class);
});
