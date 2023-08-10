<?php

namespace App\Http\Controllers\Api;

use App\Models\ActivitiesCatogery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class ActivitiesCatogeryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            
            $activities_catogeries = ActivitiesCatogery::where('status',1)->orderBy('arrange')->orderByDesc('created_at')
                ->select('id', 'image', DB::raw("name_" . app()->getLocale() . " AS name"))
                ->paginate(10);



            return response()->json([
                'status_code' => 200,
                'message' => 'Success',               
                'activities_catogeries' => [
                    'current_page' => $activities_catogeries->currentPage(),
                    'data' => $activities_catogeries->items(),
                    'first_page_url' => $activities_catogeries->url(1),
                    'from' => $activities_catogeries->firstItem(),
                    'last_page' => $activities_catogeries->lastPage(),
                    'last_page_url' => $activities_catogeries->url($activities_catogeries->lastPage()),
                    'links' => $activities_catogeries->links()->elements,
                    'next_page_url' => $activities_catogeries->nextPageUrl(),
                    'path' => $activities_catogeries->path(),
                    'per_page' => $activities_catogeries->perPage(),
                    'prev_page_url' => $activities_catogeries->previousPageUrl(),
                    'to' => $activities_catogeries->lastItem(),
                    'total' => $activities_catogeries->total(),
                ],

            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve activities_catogeries.' . $e, 'status_code' => 500], 500);
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
     * @param  \App\Models\ActivitiesCatogery  $activitiesCatogery
     * @return \Illuminate\Http\Response
     */
    public function show(ActivitiesCatogery $activitiesCatogery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActivitiesCatogery  $activitiesCatogery
     * @return \Illuminate\Http\Response
     */
    public function edit(ActivitiesCatogery $activitiesCatogery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActivitiesCatogery  $activitiesCatogery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActivitiesCatogery $activitiesCatogery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActivitiesCatogery  $activitiesCatogery
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivitiesCatogery $activitiesCatogery)
    {
        //
    }
}