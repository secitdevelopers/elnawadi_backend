<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Cacher{
    public function __construct( public string $store = 'file'){}
   //file //redis
    
  

    public function setCached($key,$value){

        $cachedData = Cache::store($this->store)->put($key,$value);
  
    }

  public function getCached($key){

    $cachedData =   Cache::store($this->store)->get($key);
        if($cachedData){
            return json_decode($cachedData);
        }
        
    }

    public function removeCached($key){

        Cache::store($this->store)->forget($key);
  
        
    }
}

function Getusername(){
    return Auth::User()->name;
}

function Getuserphone(){
    return Auth::User()->phone??'0';
}

function  Getusertype(){
    return Auth::User()->user_type;
}


function Getuserid(){
    return Auth::User()->id;
}


function Getuseremail(){
    return Auth::User()->email;
}

         function getFileType($file)
        {
            $allowedImageExtensions = ['jpeg', 'jpg', 'png', 'gif'];
            $allowedVideoExtensions = ['mp4', 'avi', 'mov', 'flv', 'mkv'];
            $extension = strtolower($file->getClientOriginalExtension());

            if (in_array($extension, $allowedImageExtensions)) {
                return 'image';
            } elseif (in_array($extension, $allowedVideoExtensions)) {
                return 'video';
            }

            // Default to 'image' if the file extension is not recognized
            return 'image';
        }

function statusToArabic($status){

    if ($status == 'pending') {
        return 'قيد الانتظار';
    } else if ($status == 'processing') {
        return 'قيد المعالجه';
    } else if ($status == 'delivering') {
        return 'جاري التوصيل';
    } else if ($status == 'completed') {
        return 'مكتمل';
    } else if ($status == 'cancelled') {
        return 'تم الالغاء';
    } else {
     return 'تم الاسترجاع';
    }

}


function statusPayment($status){

    if ($status == 'pending') {
        return 'بانتظار الدفع';
    } else if ($status == 'paid') {
        return 'تم الدفع';
    } else {
        return 'فشل الدفع';
    }

}




function typeWithdrawer($status){
    if ($status == 'won') {
        return 'ربح';
    } else if ($status == 'drawn') {
        return 'مسحوب';
    } else {
        return 'معلق';
    }
}