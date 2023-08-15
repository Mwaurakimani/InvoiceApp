<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Mockery\Exception;

class BookingController extends Controller
{
    public function validateBooking($request){

        $request->validate([
            'clientName' => 'required|max:100',
            'clientNumber' => 'required|numeric|min:15',
            'clientEmail' => 'sometimes|email',
            'pickUpLocation' => 'required|max:190',
            'pickUpTime' => 'sometimes|date_format:"Y-m-d\TH:i"',
            'destination' => 'required',
            'returnTime' => 'sometimes|nullable|date_format:Y-m-d\TH:i',
            'vehicle' => ['required','vehicle_exist:vehicle'],
            'fuelCoveredBy' => 'required|in:Company,Driver,Client',
            'price' => 'required|numeric',
            'notes' => 'sometimes|max:1000',
        ]);
    }

    public function PostBooking(Request $request)
    {
        $this->validateBooking($request);

        $booking = Booking::create([
            'clientName' => $request['clientName'],
            'clientNumber' => $request['clientNumber'],
            'clientEmail' => $request['clientEmail'],
            'pickUpLocation' => $request['pickUpLocation'],
            'pickUpTime' => $request['pickUpTime'],
            'destination' => $request['destination'],
            'returnTime' => $request['returnTime'],
            'vehicle_id' => (Vehicle::where('Registration_number',[$request['vehicle']])->first())->id,
            'fuelCoveredBy' => $request['fuelCoveredBy'],
            'price' => $request['price'],
            'notes' => $request['notes']
        ]);

        return redirect()->route('booking.ListBookings');
    }

    public function PutBooking(Request $request, Booking $id){
        $this->validateBooking($request);

        $booking = $id->update([
            'clientName' => $request['clientName'],
            'clientNumber' => $request['clientNumber'],
            'clientEmail' => $request['clientEmail'],
            'pickUpLocation' => $request['pickUpLocation'],
            'pickUpTime' => $request['pickUpTime'],
            'destination' => $request['destination'],
            'returnTime' => $request['returnTime'],
            'vehicle_id' => (Vehicle::where('Registration_number',[$request['vehicle']])->first())->id,
            'fuelCoveredBy' => $request['fuelCoveredBy'],
            'price' => $request['price'],
            'notes' => $request['notes']
        ]);

        return redirect()->route('booking.ListBookings');
    }


}
