<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    function index()  {
        return view('landing-page.image');
    }  
    
    public function storeWeb(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'email' => 'nullable|string|email',
        ]);

        ContactUs::create($validatedData);
        // $('.toast').toast('show');
        return back()->with([
            'status_code' => 200,
            'message' => 'تم الإرسال بنجاح',
        ]);
      
    }
}