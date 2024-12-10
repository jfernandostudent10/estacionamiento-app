<?php

use App\Http\Controllers\ApproveVehicleController;
use App\Http\Controllers\VehicleController;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', \App\Livewire\Home::class)->name('home');
    Route::resource('vehicles', VehicleController::class)->middleware('role:student|teacher');
    Route::resource('approve-vehicles', ApproveVehicleController::class);
    Route::get('/users/{role}', function ($role) {
        return view('users.index', ['role' => $role]);
    })->can('users.index')->name('users.index');
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

Route::get('test/{email}/{status}/{plate}/{site}', function ($email, $status, $plate, $site) {
    try {
        \Services\SendEmailService::sendEmail($email, $status, $plate, $site);
    } catch (Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
    }
});