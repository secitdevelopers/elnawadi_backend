<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BannerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
          $cacheKey = 'banners';
        try {
          if (Cache::has($cacheKey)) {
            // If data is found in the cache, return it
            $banners = Cache::get($cacheKey);
         
        } else {
            // If data is not found in the cache, retrieve it from the database
             $banners = Banner::orderBy('arrange')->get();

            // Store the data in the cache with the unique cache key
            Cache::put($cacheKey, $banners, now()->addMinutes(60)); // Adjust the cache duration as needed

        }
          $banners = Banner::orderBy('arrange')->get();

           return response()->json([
                'status_code' => 200,
                'message' => 'Success',               
                'banners' =>$banners ,

            ], 200);
        } catch (\Throwable $e) {
             return response()->json(['message' => 'Failed to retrieve banners.', 'status_code' => 500], 500);
        }
    }
}