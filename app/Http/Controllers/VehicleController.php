<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function postVehicle(Request $request)
    {
        $validated = $request->validate([
            "Name" => ['required',"max:100"],
            "Registration_number" => ['required',"max:100"],
            "make" => ['required','numeric',"max_digits:5"],
            "engine_size" => ['required','numeric',"max_digits:13"],
            "transmission" => ['required'],
            "fuel_capacity" => ['required','numeric',"max_digits:10"],
            "odometer_reading" => ['required','numeric',"max_digits:10"],
            "seats" => ['required','numeric',"max_digits:10"],
            "status" => ['required'],
            "Notes" => ['sometimes','max:35000'],
        ]);

        $vehicle = Vehicle::create($validated);
        $vehicle->refresh();

        return redirect()->route('vehicle.ListVehicles');
    }

    public function putVehicle(Request $request,Vehicle $vehicle)
    {
        $validated = $request->validate([
            "Name" => ['required',"max:100"],
            "Registration_number" => ['required',"max:100"],
            "make" => ['required','numeric',"max_digits:5"],
            "engine_size" => ['required','numeric',"max_digits:13"],
            "transmission" => ['required'],
            "fuel_capacity" => ['required','numeric'],
            "odometer_reading" => ['required','numeric',"max_digits:10"],
            "seats" => ['required','numeric',"max_digits:10"],
            "status" => ['required'],
            "Notes" => ['sometimes','max:35000'],
        ]);

        $vehicle->update($validated);
        $vehicle->refresh();

        return redirect()->route('vehicle.ViewVehicle',['Vehicle' => $vehicle->id]);
    }

    public function get_driver_by_registration_number(Request $request)
    {
        $reg_no =!empty($request['reg_no']) ? $request['reg_no'] : null;

        if($reg_no == null){
            return [];
        }

        return collect(Vehicle::where('Registration_number','Like','%'.$reg_no.'%')->get())->values();

    }

    public function assign_vehicle(Request $request)
    {
        $user = User::find($request['driver']);
        $vehicle = Vehicle::find($request['vehicle']);

        $user->vehicle()->sync($vehicle->id);
    }

    public function un_assignVehicle(Request $request)
    {
        $user = User::find($request['driver']);
        $vehicle = Vehicle::find($request['vehicle']);

        $user->vehicle()->detach($vehicle->id);
    }
}
