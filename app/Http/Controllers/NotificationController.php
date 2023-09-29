<?php

namespace App\Http\Controllers;

use App\Jobs\SendFCMNotificationJob;
use App\Models\User;
use App\Notifications\AdminMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{



public function sendNotificationToAll(Request $request)
{
    $messageFromAdmin = $request->message;
    $titleFromAdmin = $request->title;

    $users = User::all();  // or any filtered list of users

    // Sending Notification via Database
    Notification::send($users, new AdminMessage($messageFromAdmin, $titleFromAdmin));

    // Dispatch Job for Each User with FCM Token
    foreach ($users as $user) {
        if ($user->fcm) {
            SendFCMNotificationJob::dispatch($user->fcm, $titleFromAdmin, $messageFromAdmin);
        }
    }
    
    session()->flash('Add', 'تم ارسال الاشعار لجميع المستخدمين بنجاج');
    return back();
}




    public function sendNotificationToUser(Request $request)
    {
        $messageFromAdmin = $request->message;
        $titleFromAdmin = $request->title;
        $userId = $request->user_id;

        $user = User::find($userId);
        if(!$user) {
            session()->flash('Error', 'User not found');
            return back();
        }

        // Sending Notification via Database
        Notification::send([$user], new AdminMessage($messageFromAdmin, $titleFromAdmin));

        // Dispatch Job for FCM Notification
        if ($user->fcm) {
            SendFCMNotificationJob::dispatch($user->fcm, $titleFromAdmin, $messageFromAdmin);
            session()->flash('Add', 'تم ارسال الاشعار لهذ المستخدم بنجاج');
        } else {
            session()->flash('Add', 'تم ارسال الاشعار لهذ المستخدم بنجاج ولكن العضو ليس لديه رمز FCM');
        }

        return back();
    }

    // private function sendPushNotification($fcmToken, $title, $message)
    // {
    //     $SERVER_API_KEY = 'YOUR_SERVER_API_KEY';

    //     $data = [
    //         "registration_ids" => [$fcmToken],
    //         "notification" => [
    //             "title" => $title,
    //             "body" => $message,
    //             "sound" => "default"
    //         ],
    //     ];

    //     $headers = [
    //         'Authorization: key=' . $SERVER_API_KEY,
    //         'Content-Type: application/json',
    //     ];

    //     $ch = curl_init('https://fcm.googleapis.com/fcm/send');
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        
    //     $response = curl_exec($ch);
    //     $responseArray = json_decode($response, true); // Convert JSON string to array

    //     curl_close($ch);

    //     return $responseArray['success'] == 0 ? " و لاكن بدون صوت " : "";
    // }



}