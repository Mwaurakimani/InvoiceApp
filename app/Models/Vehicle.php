<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Registration_number',
        'make',
        'engine_size',
        'transmission',
        'fuel_capacity',
        'odometer_reading',
        'seats',
        'status',
        'Notes',
    ];

    public function driver(){
        return $this->belongsToMany(User::class,UserVehicle::class);
    }
}
