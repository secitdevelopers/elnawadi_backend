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
        $setting = Setting::where('isadmin', true)->first();
        return response()->json([
            'setting' => $setting,
            'message' => 'Success',
            'status_code' => 200
        ], 200);
    }

    public function shopDetalis($id)
    {
        $setting = Setting::where('id', $id)->first();
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





    public function getCompanies()
    {

        try {

            $companies = Setting::where('status', 1)->orderBy('arrange')->orderByDesc('created_at')
                ->select('id', 'logo', "company_name", "user_id")
                ->paginate(10);



            return response()->json([
                'status_code' => 200,
                'message' => 'Success',
                'companies' => [
                    'current_page' => $companies->currentPage(),
                    'data' => $companies->items(),
                    'first_page_url' => $companies->url(1),
                    'from' => $companies->firstItem(),
                    'last_page' => $companies->lastPage(),
                    'last_page_url' => $companies->url($companies->lastPage()),
                    'links' => $companies->links()->elements,
                    'next_page_url' => $companies->nextPageUrl(),
                    'path' => $companies->path(),
                    'per_page' => $companies->perPage(),
                    'prev_page_url' => $companies->previousPageUrl(),
                    'to' => $companies->lastItem(),
                    'total' => $companies->total(),
                ],

            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve companies.' . $e, 'status_code' => 500], 500);
        }
    }
}