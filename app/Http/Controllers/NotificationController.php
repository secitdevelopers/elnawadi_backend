<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\AdminMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function sendNotification(Request $request)
    {
        $messageFromAdmin = $request->message;
        $titleFromAdmin = $request->title;

        if ($request->type == "all") {
            $users = User::all();  // or any filtered list of users
            Notification::send($users, new AdminMessage($messageFromAdmin, $titleFromAdmin));
            session()->flash('Add', 'تم ارسال الاشعار لجميع المستخدمين بنجاج');
            return back();
        } else {

            $user = User::find($request->user_id);  // or any filtered list of users
            Notification::send([$user], new AdminMessage($messageFromAdmin, $titleFromAdmin));
            $errorSound = "";

            if ($user->fcm)
            {

                $SERVER_API_KEY = 'AAAAL-FK3cA:APA91bEgG8PM26oCSh-W1xzBLRQg1IKStRFyRn-CnZSh0JIeTjpOtpeFthRGiyYVDmKg0PK9l17WxomyR-x1N2A5uCJe-75nyeAdML8oFMW-Ygl7Q-W3ynVHb8BP5zh4ccIk6Cu2SWDm';

                $token_1 = $user->fcm;

                $data = [

                    "registration_ids" => [
                        $token_1
                    ],

                    "notification" => [

                        "title" => $titleFromAdmin,

                        "body" => $messageFromAdmin,

                        "sound" => "default" // required for sound on ios

                    ],

                ];

                $dataString = json_encode($data);

                $headers = [

                    'Authorization: key=' . $SERVER_API_KEY,

                    'Content-Type: application/json',

                ];

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

                curl_setopt($ch, CURLOPT_POST, true);

                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

                $response = curl_exec($ch);
                $responseArray = json_decode($response, true); // Convert JSON string to array

                if ($responseArray['success'] == 0)
                {
                    $errorSound = " و لاكن بدون صوت " ;
                }

            }


            session()->flash('Add', 'تم ارسال الاشعار لهذ المستخدم بنجاج'.$errorSound);
            return back();
        }
    }
}