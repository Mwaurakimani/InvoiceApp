<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mileage extends Model
{
    use HasFactory;

    protected $fillable = [
        'reading',
        'mileage_at',
        'trip_id',
        'user_id'
    ];
}
