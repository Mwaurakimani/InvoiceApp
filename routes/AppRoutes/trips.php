<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::name('trips.')->group(function (){
    Route::get('/Trips', function () {
        return Inertia::render('Trips/trips');
    })->name('ListTrips');

    Route::get('/Trips/{id}/view', function () {
        return Inertia::render('Trips/SubPages/ViewTrips');
    })->name('ViewTrips');
});
