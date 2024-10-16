<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages/authentication/login');
});

Route::get('/login', function () {
    return view('pages/authentication/login');
});


Route::get('/register', function () {
    return view('pages/authentication/register');
});

Route::get('/forgot-password', function () {
    return view('pages/authentication/forgot_password');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
