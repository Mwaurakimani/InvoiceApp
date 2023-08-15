<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Mileage;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use JetBrains\PhpStorm\NoReturn;
use Mockery\Exception;


class TripController extends Controller
{

    public function startTrip(Request $request, $trip)
    {
        $booking = Booking::find($trip);

        try {

            if ($booking == null) {
                throw new Exception("Booking could not be found", 404);
            }

            if ($booking->vehicle == null) {
                throw new Exception("Vehicle could not be found", 404);
            }

            if ($booking->vehicle->driver->first() == null) {
                throw new Exception("No driver assigned to this vehicle", 404);
            }

            $trip = Trip::where([
                'booking_id' => $booking->id,
                'vehicle_id' => $booking->vehicle->id,
                'user_id' => $booking->vehicle->driver->first()->id
            ])->first();


            if ($trip != null) {
                $trip->update([
                    'booking_id' => $booking->id,
                    'vehicle_id' => $booking->vehicle->id,
                    'user_id' => $booking->vehicle->driver->first()->id,
                ]);

                $trip->refresh();
            } else {
                $trip = Trip::create([
                    'booking_id' => $booking->id,
                    'vehicle_id' => $booking->vehicle->id,
                    'user_id' => $booking->vehicle->driver->first()->id,
                ]);
            }

            return redirect()->route('trips.ViewTrips', ['id' => $trip->id]);

        } catch (Exception $exp) {
            return redirect()->back()->withErrors([
                'StartTripException' => $exp->getMessage()
            ]);
        }

    }

    public function postMileage(Request $request, Trip $trip)
    {
        $request->validate([
            'current_reading' => 'numeric|max:100000',
            'mileage_at' => [new Enum(Enums\ServerStatus::class)]
        ]);

        $mileage = Mileage::create([
            'trip_id' => $trip->id,
            'user_id' => $trip->driver->id,
            'reading' => $request['current_reading'],
            'mileage_at' => $request['mileage_at']
        ]);

        $mileage->refresh();

        return redirect()->back();
    }

    public function putMileage(Request $request, Mileage $mileage)
    {
        $request->validate([
            'id' => 'required',
            'current_reading' => 'required|numeric|max:100000',
            'mileage_at' => ['required',new Enum(Enums\ServerStatus::class)]
        ]);

        $mileage->update([
            'reading' => $request['current_reading'],
            'mileage_at' => $request['mileage_at']
        ]);

        $mileage->refresh();

        return redirect()->back();
    }

    public function deleteMileage(Request $req,Mileage $mileage){
        $mileage->delete();
        return redirect()->back();
    }

    #[NoReturn] public function deleteTrip(Request $request, Trip $trip){
        $trip->delete();
        return redirect()->route('trips.ListTrips');
    }
}
