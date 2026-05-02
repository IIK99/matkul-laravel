<?php

use Illuminate\Support\Facades\Route;
use App\Models\Menu;

Route::get('/', function () {
    $pets = Menu::all();
    return view('pages.home', compact('pets'));
})->name('home');

Route::get('/menu', function () {
    $pets = Menu::all();
    return view('pages.menu', compact('pets'));
})->name('menu');

Route::get('/menu/{id}', function ($id) {
    $pet = Menu::findOrFail($id);
    return view('pages.detail_menu', compact('pet'));
})->name('menu.detail');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');
