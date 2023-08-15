<?php

namespace App\Http\Controllers;

use App\Models\AppNotification;
use Illuminate\Http\Request;

class AppNotificationController extends Controller
{
    public function postNotification(Request $request){
        $request->validate([
            'title' => 'required|min:2|max:100',
            'message' => 'required|min:2|max:2000',
        ]);

        $notification = new AppNotification();

        $notification->title = $request['title'];
        $notification->message = $request['title'];

        $notification->save();

        return redirect()->route('notifications.ListNotifications');
    }

    public function deleteNotification( Request $request, AppNotification $notification)
    {
        $notification->delete();

        return redirect()->route('notifications.ListNotifications');
    }
}
