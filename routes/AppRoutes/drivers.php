<?php

use App\Http\Controllers\VehicleController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::name('drivers.')->group(function () {
    Route::get('/Drivers', function () {
        $drivers = User::with('designation','vehicle')
            ->whereHas('designation', function ($query) {
            $query->where('designation_id', 3);
        })->get();

        return Inertia::render('Drivers/drivers', [
            'drivers' => $drivers
        ]);
    })->name('ListDrivers');

    Route::get('/Drivers/{driver}/view', function (User $driver) {
        $driver->load('vehicle');

        return Inertia::render('Drivers/SubPages/ViewDriver', [
            'driver' => $driver
        ]);
    })->name('ViewDriver');

    Route::get('/Drivers/create', function () {
        return Inertia::render('Drivers/SubPages/CreateDriver');
    })->name('CreateDriver');

    Route::get('/Drivers/{id}/edit', function () {
        return Inertia::render('Drivers/SubPages/CreateDriver');
    })->name('EditDriver');

    Route::post('get_vehicle',[VehicleController::class,'get_driver_by_registration_number'])->name('get_vehicle');
    Route::post('assign_vehicle',[VehicleController::class,'assign_vehicle'])->name('assign_vehicle');
    Route::post('un_assignVehicle',[VehicleController::class,'un_assignVehicle'])->name('un_assignVehicle');
});
