<?php

use App\Http\Controllers\AppNotificationController;
use App\Models\AppNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::name('notifications.')->group(function (){

    Route::get('/Notifications', function () {
        $notifications = AppNotification::all();

        return Inertia::render('Notifications/notifications',[
            'notifications' => $notifications
        ]);
    })->name('ListNotifications');

    Route::get('/Notifications/create', function () {
        return Inertia::render('Notifications/SubPages/CreateNotifications');
    })->name('CreateNotifications');

    Route::get('/Notifications/{AppNotification}/view', function (Request $request, AppNotification $AppNotification) {

        return Inertia::render('Notifications/SubPages/ViewNotifications',[
            'notification' => $AppNotification
        ]);

    })->name('ViewNotification');


    Route::get('/Notifications/{id}/edit', function () {
        return Inertia::render('Notifications/SubPages/EditNotifications');
    })->name('EditNotification');



    Route::post('/postNavigation',[AppNotificationController::class,'postNotification'])->name('saveNotification');

    Route::delete('/postNavigation/{notification}',[AppNotificationController::class,'deleteNotification'])->name('DeleteNotification');
});
