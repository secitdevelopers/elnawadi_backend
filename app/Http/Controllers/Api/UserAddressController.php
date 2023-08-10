<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserAddressRequest;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class UserAddressController extends Controller
{

    public function index()
    {
        try
        {
            $userAddresses = UserAddress::all();
            return response()->json([
                'userAddresses' => $userAddresses,
                'message' => 'Success',
                'status_code' => Response::HTTP_OK,
            ]);
        }
        catch (\Throwable $th)
        {
            return response()->json(['message' => 'Failed to retrieve data.', 'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // The rest of your code...



    public function store(Request $request)
    {
        try
        {
            $validator = Validator::make($request->all(), [
                'country' => 'required|string',
                'state' => 'nullable|string',
                'city' => 'required|string',
                'zip' => 'nullable|string',
                'address_1' => 'required|string',
                'address_2' => 'nullable|string',
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'delivery_instruction' => 'nullable|string',
                'default' => 'required|in:0,1',
            ]);

            if ($validator->fails())
            {
                return response()->json(['message' => 'Validation error', 'errors' => $validator->errors(), 'status_code' => 400], 400);
            }

            $userAddress = UserAddress::create(array_merge($validator->validated(), ['user_id' => $request->user->id]));
            return response()->json([
                // 'userAddress' => $userAddress,
                'message' => 'Success',
                'status_code' => Response::HTTP_OK,
            ]);
        }
        catch (\Throwable $th)
        {
            return response()->json(['message' => 'Failed to store user address.' . $th, 'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // The rest of your code...


    public function show(UserAddress $userAddress)
    {
        return response()->json($userAddress);
    }

    public function update(Request $request)
    {
        try
        {
            $validator = Validator::make($request->all(), [
                'id' => 'required|exists:user_addresses,id',
                'country' => 'string',
                'state' => 'nullable|string',
                'city' => 'required|string',
                'zip' => 'nullable|string',
                'address_1' => 'required|string',
                'address_2' => 'nullable|string',
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'delivery_instruction' => 'nullable|string',
                'default' => 'required|in:0,1',
            ]);

            if ($validator->fails())
            {
                return response()->json(['message' => 'Validation error', 'errors' => $validator->errors(), 'status_code' => 400], 400);
            }
            $userAddress = UserAddress::find($request->id);
            $userAddress->update($validator->validated());
            return response()->json([

                'message' => 'Success',
                'status_code' => Response::HTTP_OK,
            ]);
        }
        catch (\Throwable $th)
        {
            return response()->json(['message' => 'Failed to store user address.' , 'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy($id)
    {
        try
        {
            $userAddress = UserAddress::find($id);
            $userAddress->delete();
            return response()->json([

                'message' => 'Success',
                'status_code' => Response::HTTP_OK,
            ]);
        }
        catch (\Throwable $th)
        {
            return response()->json(['message' => 'Failed to delete user address.', 'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}