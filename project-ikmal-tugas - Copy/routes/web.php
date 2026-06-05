<?php

use Illuminate\Support\Facades\Route;
use App\Models\Menu;

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

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\AdminMenuController;

Route::get('/admin/login', [AdminAuthController::class, 'showLoginFrom'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminMenuController::class, 'index'])->name('dashboard');
    Route::resource('menus', AdminMenuController::class);
    Route::get('/cetak_pdf', [AdminMenuController::class, 'cetak_pdf'])->name('menus.cetak_pdf');
    Route::get('/cetak_pdf/{id}', [AdminMenuController::class, 'cetak_pdf_By_Id'])->name('menus.cetak_pdf_By_Id');
});
