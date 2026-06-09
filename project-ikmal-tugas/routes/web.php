<?php

use Illuminate\Support\Facades\Route;
use App\Models\Menu;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\AdminUserController;

Route::get('/', function () {
    $menus = Menu::all();
    return view('pages.home', compact('menus'));
})->name('home');

Route::get('/menu', function () {
    $menus = Menu::all();
    return view('pages.menu', compact('menus'));
})->name('menu');

Route::get('/menu/{id}', function ($id) {
    $menu = Menu::findOrFail($id);
    return view('pages.detail_menu', compact('menu'));
})->name('menu.detail');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login')->middleware('guest');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit')->middleware('guest');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout')->middleware('auth');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/menus/pdf', [AdminMenuController::class, 'cetak_pdf'])->name('menus.cetak_pdf');
    Route::get('/menus/pdf/{id}', [AdminMenuController::class, 'cetak_pdf_By_Id'])->name('menus.cetak_pdf_by_id');
    Route::resource('menus', AdminMenuController::class);

    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users');
});
