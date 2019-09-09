<?php

namespace App\Http\Controllers;
	
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
       
    	$this->middleware('auth');
    }

    public function notifications(Request $request)
    {
    	$notifications = $request->user()->notifications; //Mostra toda as notifications
        $notifications = $request->user()->unreadNotifications; //Notifications no leidas

    	return response()->json(compact('notifications'));
    }

    public function markAsRead(Request $request)
    {
        $notification = $request->user()
                                    ->notifications()
                                    ->where('id', $request->id)
                                    ->first();

        if ($notification)
            $notification->markAsRead();

        //return response()->json(compact('notifications'));
    }

    public function markAllAsRead(Request $request)
    {
        $request->user()->unreadNotifications->markAsRead();
    }
}
