<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::name('finances.')->group(function (){
    Route::get('/Finances', function () {
        return Inertia::render('Finances/finances');
    })->name('Finances');

//    Route::get('/Finances/{id}/view', function () {
//        return Inertia::render('Vehicles/SubPages/ViewVehicle');
//    })->name('ViewFinances');
//
//    Route::get('/Finances/create', function () {
//        return Inertia::render('Vehicles/SubPages/CreateVehicle');
//    })->name('CreateFinances');
//
//    Route::get('/Finances/{id}/edit', function () {
//        return Inertia::render('Vehicles/SubPages/CreateVehicle');
//    })->name('EditFinances');
});
