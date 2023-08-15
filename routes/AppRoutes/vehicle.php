<?php

use App\Http\Controllers\VehicleController;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::name('vehicle.')->group(function () {


    Route::get('/Vehicles', function () {

        $vehicles = Vehicle::with('driver')->get();

        return Inertia::render('Vehicles/vehicle',[
            "vehicles" => $vehicles
        ]);
    })->name('ListVehicles');

    Route::get('/Vehicles/{Vehicle}/view', function (Request $request,Vehicle $Vehicle) {
        $mileages = DB::select('select
                                            vehicle_id as vehicle_id,
                                            reading,
                                            mileage_at,
                                            mileages.created_at
                                        from mileages
                                        join trips t on t.id = mileages.trip_id
                                        join vehicles v on v.id = t.vehicle_id
                                        where v.id = ?
                                        order by mileages.created_at desc
                                        ',[$Vehicle->id]);



        $Vehicle->load('driver');

        return Inertia::render('Vehicles/SubPages/ViewVehicle',[
            'vehicle' => $Vehicle,
            'mileage' => $mileages
        ]);
    })->name('ViewVehicle');

    Route::get('/Vehicles/create', function () {
        return Inertia::render('Vehicles/SubPages/CreateVehicle');
    })->name('CreateVehicle');

    Route::get('/Vehicles/{Vehicle}/edit', function (Request $request,Vehicle $Vehicle) {

        return Inertia::render('Vehicles/SubPages/EditVehicle',[
            'vehicle' => $Vehicle
        ]);
    })->name('EditVehicle');


    Route::post('/postVehicle', [VehicleController::class,'postVehicle'])->name('postVehicle');

    Route::put('/putVehicle/{vehicle}', [VehicleController::class,'putVehicle'])->name('putVehicle');
});
