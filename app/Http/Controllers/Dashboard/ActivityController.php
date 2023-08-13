<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\ActivitiesCatogery;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Traits\ImageProcessing;
use Illuminate\Support\Facades\DB;
class ActivityController extends Controller
{
    use ImageProcessing;

    public function index()
    {
        $activities = Activity::all();

        return view('dashboard.activity.index', compact('activities'));
    }

    public function create()
    {

        $categories = ActivitiesCatogery::all();
        return view('dashboard.activity.store',compact('categories'));
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
     * @param  \App\Models\activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try
        {
            // Retrieve the product
            $activity = Activity::findOrFail($request->id);
            $this->deleteImage($activity->image);
            // Delete the product
            $activity->delete();

            DB::commit();
            session()->flash('delete', 'تم الحذف  النشاط بنجاح');
            return redirect()->back()->withSuccess('activity deleted successfully.');
        }
        catch (\Exception $e)
        {
            DB::rollback();
            throw $e;
        }
    }


   public function updateStatusProduct(Request $request)
    {
        $isToggleOnString = (string) $request->isToggleOn;
        $status = true;
        $activityId = $request->input('activityId');
        if ($isToggleOnString == "true")
        {
            $status = true;
        }
        else
        {
            $status = false;
        }



        $product = Activity::find($activityId);

        if ($product)
        {
            // Update the status field
            $product->status = $status;
            $product->save();

            return response()->json(['success' => true, 'message' => 'Activity status  updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Activity not found']);
    }

}