<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('orchid.custom-tabs');
});

Route::get('/set-locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    App::setLocale($locale);
    return redirect()->back();
})->name('set-locale');

