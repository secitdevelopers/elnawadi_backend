<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


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