<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionController extends Controller
{
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
        try
        {
            $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'living' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'subscription_amount' => 'required|numeric|min:0',
            'activity_id' => 'required|exists:activities,id',
            // 'user_id' => 'required|exists:users,id',
            ]);

            if ($validator->fails())
            {
                return response()->json(['message' => 'Validation error', 'errors' => $validator->errors(), 'status_code' => 400], 400);
            }

            $subscription = Subscription::create(array_merge($validator->validated(), ['user_id' => $request->user->id]));
            return response()->json([
                // 'userAddress' => $userAddress,
                'message' => 'Success',
                'status_code' => Response::HTTP_OK,
            ]);
        }
        catch (\Throwable $th)
        {
            return response()->json(['message' => 'Failed to store user subscription.', 'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
          try {
            
              $user = User::findOrFail($request->user->id);

             $subscribedActivities = $user->subscribedActivities()->paginate(10);;



            return response()->json([
                'status_code' => 200,
                'message' => 'Success',               
                'subscribedActivities' => [
                    'current_page' => $subscribedActivities->currentPage(),
                    'data' => $subscribedActivities->items(),
                    'first_page_url' => $subscribedActivities->url(1),
                    'from' => $subscribedActivities->firstItem(),
                    'last_page' => $subscribedActivities->lastPage(),
                    'last_page_url' => $subscribedActivities->url($subscribedActivities->lastPage()),
                    'links' => $subscribedActivities->links()->elements,
                    'next_page_url' => $subscribedActivities->nextPageUrl(),
                    'path' => $subscribedActivities->path(),
                    'per_page' => $subscribedActivities->perPage(),
                    'prev_page_url' => $subscribedActivities->previousPageUrl(),
                    'to' => $subscribedActivities->lastItem(),
                    'total' => $subscribedActivities->total(),
                ],

            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve subscribedActivities.' . $e, 'status_code' => 500], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}