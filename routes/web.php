<?php

use App\Http\Controllers\ApproveVehicleController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('vehicles', VehicleController::class);
Route::resource('approve-vehicles', ApproveVehicleController::class);