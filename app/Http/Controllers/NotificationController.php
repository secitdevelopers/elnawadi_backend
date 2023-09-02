<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\AdminMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
class NotificationController extends Controller
{
   public function sendNotification(Request $request)  {
        $messageFromAdmin = $request->message;
        $titleFromAdmin = $request->title;

        if ($request->type =="all") {
        $users = User::all();  // or any filtered list of users
        Notification::send($users, new AdminMessage($messageFromAdmin,$titleFromAdmin));
        session()->flash('Add', 'تم ارسال الاشعار لجميع المستخدمين بنجاج');
        return back();
        } else {
        $user = User::find($request->user_id);  // or any filtered list of users
        Notification::send($user, new AdminMessage($messageFromAdmin,$titleFromAdmin));
        session()->flash('Add', 'تم ارسال الاشعار لهذ المستخدم بنجاج');
        return back();
        }
        


    }
    
}