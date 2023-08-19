<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\Order;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{


    function userOrder(Request $request)
    {
        try {
            $userId = $request->user->id;
            $orders = Order::where('user_id', '=', $userId)->get();


            return response()->json([
                'status_code' => 200,
                'message' => 'Success',
                'orders' => $orders,

            ], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to get orders', 'error' => $th->getMessage()], 500);
        }
    }


    function orderDetalis($id)
    {
        try {
            $validator = Validator::make(['id' => $id], [
                'id' => 'required|integer|exists:orders,id',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation error', 'errors' => $validator->errors(), 'status_code' => 400], 400);
            }
            $order = Order::with('user', 'coupon', 'orderItems', 'orderItems.product', 'userAddress')->find($id);
            return response()->json([
                'status_code' => 200,
                'message' => 'Success',
                'order' => $order,

            ], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to get orders', 'error' => $th->getMessage()], 500);
        }
    }





    public function saveOrder(Request $request)
    {

        $request->validate([
            'user_address_id' => 'required|integer',
            'payment_method' => 'required|string',
            'coupon_code' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $token = $request->bearerToken();
        $orderPrice = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('http://localhost/khaymat/public/api/cart/checkout', [
            'user_address_id' => $request->user_address_id,
            'payment_method' => $request->payment_method,
            'coupon_code' => $request->coupon_code,
        ]);

        return $orderPrice;
        $userId = $request->user->id; //1; //$request->user->id; 
        $userAddressId = $request->input('user_address_id');
        $paymentMethod = $request->input('payment_method');
        // $paymentStatus = $request->input('payment_status');
        try {
            DB::beginTransaction();
            $copon = Coupon::where('code', $request->coupon_code)->first();
            // Save the order
            $orderId = DB::table('orders')->insertGetId([
                'status' => 'pending',
                'payment_status' => 'pending',
                'payment_method' => $paymentMethod,
                'currency' => 'aed',
                'cancelled' => false,
                // 'shipping' => $orderPrice['check_out']['total_shipping_fee'] ?? 0,
                // 'tax' => 0,
                // 'total_country_tax' => $orderPrice['check_out']['country_tax'] ?? 0,
                'discount' => $orderPrice['check_out']['total_discount'] ?? 0,
                'subtotal' => $orderPrice['check_out']['subtotal'],
                'total' => $orderPrice['check_out']['total'],
                'description' => $request->description,
                'user_id' => $userId,
                'created_at' => now(),
                'user_address_id' => $userAddressId,
                'coupon_id' => $copon->id??null,
            ]);
            $cartItems = CartItem::cartItemsData($userId)->get();
            // Save the order items
            $orderItems = [];
            foreach ($cartItems as $item) {
                $orderItems[] = [
                    'order_id' => $orderId,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                ];
            }
            DB::table('order_items')->insert($orderItems);
            CartItem::where('user_id', $userId)->delete();
            DB::commit();
            if ($paymentMethod == 'paypal') {
                return redirect()->route('payment', [
                    'orderItems' => $orderItems,
                    'order_id' => $orderId,
                ]);
            } else {
                return response()->json(['message' => 'Order saved successfully.', 'order_id' => $orderId], 200);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Failed to save the order.', 'error' => $e->getMessage()], 500);
        }
    }















    function cancelOrder(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'order_id' => 'required|integer',
            ]);
            $order = Order::find($request->order_id);
            $order->cancelled = true;
            $order->status = 'cancelled';
            $order->save();
            return response()->json([
                'message' => 'Success',
                'status_code' => 200,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to cancelled the order.',
                'status_code' => 500,
            ], 500);
        }
    }



}