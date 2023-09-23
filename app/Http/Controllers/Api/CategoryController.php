<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCatogery(Request $request): JsonResponse
    {
    
    try {
        // Define a unique cache key for each page
        $cacheKey = 'categories_page_' . $request->page;
        // Check if the data is already in the cache
        if (Cache::has($cacheKey)) {
            // If data is found in the cache, return it
            $categories = Cache::get($cacheKey);
         
        } else {
            // If data is not found in the cache, retrieve it from the database
            $categories = Category::where('status', 1)
                ->orderBy('arrange')
                ->orderByDesc('created_at')
                ->select('id', 'image', DB::raw("name_" . app()->getLocale() . " AS name"))
                ->paginate(10);

            // Store the data in the cache with the unique cache key
            Cache::put($cacheKey, $categories, now()->addMinutes(60)); // Adjust the cache duration as needed
                  $mr = "lap";
        }

        return response()->json([
            'status_code' => 200,
            'message' => 'Success',
            'categories' => [
                'current_page' => $categories->currentPage(),
                'data' => $categories->items(),
                'first_page_url' => $categories->url(1),
                'from' => $categories->firstItem(),
                'last_page' => $categories->lastPage(),
                'last_page_url' => $categories->url($categories->lastPage()),
                'links' => $categories->links()->elements,
                'next_page_url' => $categories->nextPageUrl(),
                'path' => $categories->path(),
                'per_page' => $categories->perPage(),
                'prev_page_url' => $categories->previousPageUrl(),
                'to' => $categories->lastItem(),
                'total' => $categories->total(),   
        
            ],
        ], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Failed to retrieve categories.'.$e, 'status_code' => 500], 500);
    }
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}