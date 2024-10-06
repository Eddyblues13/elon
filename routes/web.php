<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.home');
});

Route::get('/about', function () {
    return view('welcome');
});

Route::get('forex', function () {
    return view('categories.forex');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
