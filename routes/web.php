<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;  // Add this

Route::get('/', function () {
    return view('welcome');
});

Route::get('/set-locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    App::setLocale($locale);
    return redirect()->back();
})->name('set-locale');

Route::get('change-theme', function () {
    Session::put('theme', Session::get('theme') === 'dark' ? 'light' : 'dark');
    return redirect()->back();
})->name('change-theme');

// Публичные страницы
