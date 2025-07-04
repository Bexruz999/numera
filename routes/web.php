<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;  // Add this
use App\Http\Controllers\PostController;  // Add this

Route::get('/', function () {
    return view('orchid.custom-tabs');
});

Route::get('/set-locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    App::setLocale($locale);
    return redirect()->back();
})->name('set-locale');

// Публичные страницы
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/cases', [HomeController::class, 'cases'])->name('cases');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
