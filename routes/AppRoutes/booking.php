<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;




Route::name('booking.')->group(function (){
    Route::get('/Booking', function () {
        return Inertia::render('Booking/booking');
    })->name('ListBookings');

    Route::get('/Booking/{id}/view', function () {
        return Inertia::render('Booking/SubPages/ViewBooking');
    })->name('ViewBooking');

    Route::get('/Booking/create', function () {
        return Inertia::render('Booking/SubPages/CreateBooking');
    })->name('CreateBooking');

    Route::get('/Booking/{id}/edit', function () {
        return Inertia::render('Booking/SubPages/CreateBooking');
    })->name('EditBooking');
});
