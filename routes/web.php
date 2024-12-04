<?php

use App\Http\Controllers\ApproveVehicleController;
use App\Http\Controllers\VehicleController;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', \App\Livewire\Home::class)->name('home');
    Route::resource('vehicles', VehicleController::class);
    Route::resource('approve-vehicles', ApproveVehicleController::class);
});

Route::get('/seeder', function () {
    User::factory()
        ->has(
            Vehicle::factory()
                ->count(5)
        )
        ->count(10)
        ->create();

});