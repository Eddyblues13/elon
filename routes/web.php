<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.home');
});

Route::get('/about', function () {
    return view('welcome');
});



Auth::routes();


Route::get('forex', [App\Http\Controllers\CategoriesController::class, 'forexPage'])->name('forex.page');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
