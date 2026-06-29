<?php

use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact', function () {
    return redirect()->route('contact')->with('success', 'Terima kasih telah menghubungi kami!');
})->name('contact.submit');

Route::get('/admin/login', [AdminAuthController::class, 'showLoginFrom'])->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('admin.home');
    })->name('dashboard');

    Route::get('/projects/pdf', [AdminProjectController::class, 'cetak_pdf'])->name('projects.cetak_pdf');

    Route::get('/projects/pdf/{id}', [AdminProjectController::class, 'cetak_pdf_By_Id'])->name('projects.cetak_pdf_by_id');

    Route::resource('projects', AdminProjectController::class);

     Route::get('users', [UserController::class, 'index'])->name('admin.users');
});