<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;




Route::name('drivers.')->group(function (){
    Route::get('/Drivers', function () {
        return Inertia::render('Drivers/drivers');
    })->name('ListDrivers');

    Route::get('/Drivers/{id}/view', function () {
        return Inertia::render('Drivers/SubPages/ViewDriver');
    })->name('ViewDriver');

    Route::get('/Drivers/create', function () {
        return Inertia::render('Drivers/SubPages/CreateDriver');
    })->name('CreateDriver');

    Route::get('/Drivers/{id}/edit', function () {
        return Inertia::render('Drivers/SubPages/CreateDriver');
    })->name('EditDriver');
});
