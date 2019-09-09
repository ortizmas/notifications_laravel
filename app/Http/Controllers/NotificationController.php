<?php

namespace App\Http\Controllers;
	
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        //https://www.youtube.com/watch?v=DQXO27zurwo&list=PLVSNL1PHDWvSOFpHtRi1-oZjBll69lehn&index=22
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
