<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::name('notifications.')->group(function (){
    Route::get('/Notifications', function () {
        return Inertia::render('Notifications/notifications');
    })->name('ListNotifications');

    Route::get('/Notifications/create', function () {
        return Inertia::render('Notifications/SubPages/CreateNotifications');
    })->name('CreateNotifications');

    Route::get('/Notifications/{id}/view', function () {
        return Inertia::render('Notifications/SubPages/ViewNotifications');
    })->name('ViewNotification');


    Route::get('/Notifications/{id}/edit', function () {
        return Inertia::render('Notifications/SubPages/EditNotifications');
    })->name('EditNotification');
});
