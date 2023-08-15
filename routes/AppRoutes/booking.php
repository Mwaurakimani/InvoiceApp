<?php

use App\Http\Controllers\BookingController;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;




Route::name('booking.')->group(function (){

    Route::get('/Booking', function () {
        $bookings = Booking::all();

        return Inertia::render('Booking/booking',[
            'bookings' => $bookings
        ]);
    })->name('ListBookings');

    Route::get('/Booking/{id}/view', function (Request $request,$id) {

        $booking = Booking::with('vehicle')->where('id',$id)->first();

        return Inertia::render('Booking/SubPages/ViewBooking',[
            'booking' => $booking
        ]);
    })->name('ViewBooking');

    Route::get('/Booking/create', function () {
        return Inertia::render('Booking/SubPages/CreateBooking');
    })->name('CreateBooking');

    Route::get('/Booking/{id}/edit', function(Request $request, $id) {
        $booking = Booking::with('vehicle')->where('id', $id)->first();

        debug($booking->pickUpTime);

        return Inertia::render('Booking/SubPages/CreateBooking',[
            'booking' => $booking
        ]);

    })->name('EditBooking');

    Route::post('/PostBooking',[BookingController::class,'PostBooking'])->name('PostBooking');
    Route::post('/PutBooking/{id}',[BookingController::class,'PutBooking'])->name('PutBooking');
});
