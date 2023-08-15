<?php

use App\Http\Controllers\TripController;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::name('trips.')->group(function () {
    Route::get('/Trips', function () {
        $trips = Trip::all();


        return Inertia::render('Trips/trips',[
            'trips' => $trips
        ]);
    })->name('ListTrips');

    Route::get('/Trips/{id}/view', function (Request $request, $id) {
        $trips = Trip::find($id);


        $trips->load('booking');
        $trips->load('vehicle');
        $trips->load('driver');
        $trips->load('mileage');

        return Inertia::render('Trips/SubPages/ViewTrips',['trips' => $trips]);
    })->name('ViewTrips');

    Route::delete('/deleteTrip/{trip}', [TripController::class, 'deleteTrip'])->name('deleteTrip');

    Route::post('/startTrip/{id}', [TripController::class, 'startTrip'])->name('StartTrip');

    Route::post('/postMileage/{trip}', [TripController::class, 'postMileage'])->name('postMileage');

    Route::put('/putMileage/{mileage}', [TripController::class, 'putMileage'])->name('putMileage');

    Route::delete('/deleteMileAge/{mileage}', [TripController::class, 'deleteMileage'])->name('deleteMileage');
});
