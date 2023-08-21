<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Activity;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ActivityController extends Controller
{
      public function getActivity(): JsonResponse
    {
        try {
            $activities = Activity::activeAndSorted()->paginate(10);


            return response()->json([
                'activities' => [
                    'current_page' => $activities->currentPage(),
                    'data' => $activities->items(),
                    'first_page_url' => $activities->url(1),
                    'from' => $activities->firstItem(),
                    'last_page' => $activities->lastPage(),
                    'last_page_url' => $activities->url($activities->lastPage()),
                    'next_page_url' => $activities->nextPageUrl(),
                    'path' => $activities->path(),
                    'per_page' => $activities->perPage(),
                    'prev_page_url' => $activities->previousPageUrl(),
                    'to' => $activities->lastItem(),
                    'total' => $activities->total(),
                ],
                'message' => 'Success',
                'status_code' => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve activities.' . $e, 'status_code' => 500], 500);
        }
    }




    public function getactivitiesByCompany(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make(['user_id' => $request->user_id], [
                'user_id' => 'required|integer|exists:users,id',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation error', 'errors' => $validator->errors(), 'status_code' => 400], 400);
            }


            $activities = Activity::where('user_id', '=', $request->user_id)->activeAndSorted()->paginate(10);



            return response()->json([
                'activities' => [
                    'current_page' => $activities->currentPage(),
                    'data' => $activities->items(),
                    'first_page_url' => $activities->url(1),
                    'from' => $activities->firstItem(),
                    'last_page' => $activities->lastPage(),
                    'last_page_url' => $activities->url($activities->lastPage()),
                    'next_page_url' => $activities->nextPageUrl(),
                    'path' => $activities->path(),
                    'per_page' => $activities->perPage(),
                    'prev_page_url' => $activities->previousPageUrl(),
                    'to' => $activities->lastItem(),
                    'total' => $activities->total(),
                ],
                'message' => 'Success',
                'status_code' => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve activities.', 'status_code' => 500], 500);
        }
    }



    public function getActivityById($productId): JsonResponse
    {
        try {
            $validator = Validator::make(
                ['productId' => $productId],
                ['productId' => 'required|integer|exists:activities,id'],
            );


            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation error',
                    'errors' => $validator->errors(),
                    'status_code' => 400,
                ], 400);
            }

            $activities = Activity::ActivitiesById()->findOrFail($productId);


            return response()->json([
                'activities' => $activities,
                'message' => 'Success',
                'status_code' => 200,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to retrieve activities.',
                'status_code' => 500,
                'error' => $th->getMessage(),
            ], 500);
        }
    }


}