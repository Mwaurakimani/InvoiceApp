<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::name('vehicle.')->group(function (){
    Route::get('/Vehicles', function () {
        return Inertia::render('Vehicles/vehicle');
    })->name('ListVehicles');

    Route::get('/Vehicle/{id}/view', function () {
        return Inertia::render('Vehicles/SubPages/ViewVehicle');
    })->name('ViewVehicle');

    Route::get('/Vehicle/create', function () {
        return Inertia::render('Vehicles/SubPages/CreateVehicle');
    })->name('CreateVehicle');

    Route::get('/Vehicle/{id}/edit', function () {
        return Inertia::render('Vehicles/SubPages/CreateVehicle');
    })->name('EditVehicle');
});
