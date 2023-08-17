<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\ActivitiesCatogery;
use App\Models\Activity;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Traits\ImageProcessing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
         DB::beginTransaction();
        try
        {
                $rules = [
                'name_ar' => 'required|string|max:100',
                // 'name_en' => 'nullable|string|max:100',
                'activities_catogeries_id' => 'required|exists:activities_catogeries,id', // Ensure the referenced ID exists in activities_catogeries
                'price' => 'required|numeric|between:0,999999.99',
      
                'activity_duration' => 'nullable|string|max:255',
                'adress' => 'required|string|max:100',
                'start_data' => 'nullable|date',
                'end_data' => 'nullable|date',
                'description_ar' => 'required|string',
                'description_en' => 'nullable|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Image file, Max size of 2MB
            ];

        // Validate the request with the rules
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $activity = new Activity();
            $activity->name_ar = $request['name_ar'];
            // $product->name_en = $request['name_en'];
            $activity->activities_catogeries_id = $request['activities_catogeries_id'];

            $activity->price = ($request['price']);

            $activity->activity_duration = $request['activity_duration'];
            $activity->adress = $request['adress'];
            $activity->start_data = $request['start_data'];
            $activity->end_data = $request['end_data'];
            $activity->status = true;
            $activity->description_ar = $request['description_ar'];
            $data['image'] = $this->saveImage($request->file('image'), 'activity');
            $activity->image = 'imagesfp/activity/' . $data['image'];
            $activity->user_id = Auth::user()->id;
            $activity->save();
            DB::commit();
            session()->flash('Add', 'تم اضافة المنتج بنجاح ');
            return redirect()->route('activities')->with('success', 'Category created successfully');
        }
        catch (\Exception $e)
        {
            DB::rollback();
            throw $e;
        }
        
    }


    public function mangementActivity()
    {
        $subscriptions = Subscription::all(); 
        return view('dashboard.activity.mange-activity', compact('subscriptions'));
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


        public function destroySub(Request $request)
    {
        DB::beginTransaction();
        try
        {
            // Retrieve the product
            $sub = Subscription::findOrFail($request->id);
            $sub->delete();
            DB::commit();
            session()->flash('delete', 'تم الحذف بنجاح');
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



        $activity = Activity::find($activityId);

        if ($activity)
        {
            // Update the status field
            $activity->status = $status;
            $activity->save();

            return response()->json(['success' => true, 'message' => 'Activity status  updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Activity not found']);
    }

}


            // if (Auth::User()->hasRole('admin'))
            // {
            //     $product->status = true;
            // }
            // else if (Auth::User()->hasRole('vendor'))
            // {
            //     $product->status = false;
            // }
            // else
            // {
            //     session()->flash('delete', 'فشلة العمليه');
            //     return redirect()->back()->withSuccess('error');
            // }