<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = auth()->user();
        $bottonName= '';
        $notifications = $user->notifications()->orderBy('created_at', 'desc')  
        ->orderBy('created_at', 'desc')
        ->get();
        $notifications->markAsRead();
        return view('layouts.dashboard.notification-dash',compact('notifications','bottonName'));
    }
    public function marqueAllasread(Request $request)
    {
        $user = Auth::user();
        $notifications = $user->notifications()->where('read_at', null)->get();
        $notifications->markAsRead();
        return redirect()->back();
    }
    public function deleteNotification(Request $request)
    {
        $user = auth()->user();
        $notification = $user->notifications()->where('id', $request->notification_deletedId)->first();
        if ($notification) {
            $notification->delete();
            return redirect()->route('Notification')->with('success','la notification a été bien supprimer');
        }
    }
}