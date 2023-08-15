<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'clientName',
        'clientNumber',
        'clientEmail',
        'pickUpLocation',
        'pickUpTime',
        'destination',
        'returnTime',
        'vehicle_id',
        'fuelCoveredBy',
        'price',
        'notes',
    ];

    protected function pickUpTime(){
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->format('Y-m-d\TH:i'),
        );
    }

    protected function returnTime(){
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->format('Y-m-d\TH:i'),
        );
    }

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }

    public function trip(){
        return $this->hasMany(Trip::class);
    }
}
