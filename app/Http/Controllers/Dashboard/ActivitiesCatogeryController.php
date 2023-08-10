<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\ActivitiesCatogery;
use Illuminate\Http\Request;

use App\Traits\ImageProcessing;
class ActivitiesCatogeryController extends Controller
{
      use ImageProcessing;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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