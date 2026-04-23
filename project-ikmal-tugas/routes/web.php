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

Route::get('/about', function () {
    return view('pages.about');
})->name('about');
