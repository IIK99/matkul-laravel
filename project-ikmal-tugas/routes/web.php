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
