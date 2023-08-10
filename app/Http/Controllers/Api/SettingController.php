<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
       $setting = Setting::where('isadmin',true)->first();
                 return response()->json([
                'setting' => $setting,
                'message' => 'Success',
                'status_code' => 200
            ], 200);
    }

    public function shopDetalis($id)
    {
       $setting = Setting::where('id',$id)->first();
       $products = Product::where('user_id', '=', $id)->activeAndSorted()->take(10)->get();

            $products->each(function ($product) {
                // The 'final_price' attribute will be automatically accessed using the accessor
                $product->final_price;
            });
              return response()->json([
                'shop' => $setting,  
                'products' => $products,
                'message' => 'Success',
                'status_code' => 200
            ], 200);
    }
}