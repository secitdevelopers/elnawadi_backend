<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartItemController extends Controller
{
    public function addToCart(Request $request)
    {
        try
        {
            $userId = $request->user->id;

            $productId = $request->input('product_id');
            $quantity = $request->input('quantity', 1);

            // Validate the inputs
            $validator = Validator::make($request->all(), [
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1',
            ]);

            if ($validator->fails())
            {
                return response()->json(['message' => 'Validation error', 'errors' => $validator->errors(), 'status_code' => 400], 400);
            }

            // Check if the product is already in the user's cart
            $cartItem = CartItem::where('user_id', $userId) //user_id
                ->where('product_id', $productId) // product_id
                ->first();

            if ($cartItem)
            {
                // Update the quantity
                $cartItem->quantity += $quantity;
                $cartItem->save();
            }
            else
            {
                // Create a new cart item
                $cartItem = new CartItem([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                ]);
                $cartItem->save();
            }

            return response()->json(['message' => 'Product added to cart successfully', 'status_code' => 200], 200);
        }
        catch (\Exception $e)
        {
            return response()->json(['message' => 'Failed to add product to cart.' . $e, 'status_code' => 500], 500);
        }
    }
    public function reduceQuantity(Request $request)
    {
        try
        {

            $cartID = $request->input('cart_id');

            // Validate the inputs
            $validator = Validator::make($request->all(), [
                'cart_id' => 'required|exists:cart_items,id',
            ]);

            if ($validator->fails())
            {
                return response()->json(['message' => 'Validation error', 'errors' => $validator->errors(), 'status_code' => 400], 400);
            }

            // Check if the product is already in the user's cart
            $cartItem = CartItem::where('id', $cartID)->first();

            if ($cartItem)
            {
                // Reduce the quantity by one
                $cartItem->quantity--;

                // If the resulting quantity is zero or less, remove the product from the cart
                if ($cartItem->quantity <= 0)
                {
                    $cartItem->delete();
                }
                else
                {
                    $cartItem->save();
                }
            }
            else
            {
                return response()->json(['message' => 'Product not found in cart', 'status_code' => 404], 404);
            }

            return response()->json(['message' => 'Product quantity reduced successfully', 'status_code' => 200], 200);
        }
        catch (\Exception $e)
        {
            return response()->json(['message' => 'Failed to reduce product quantity.' . $e, 'status_code' => 500], 500);
        }
    }

    public function removeFromCart(Request $request)
    {
        try
        {

            $cartID = $request->input('cart_id');

            // Validate the inputs
            $validator = Validator::make($request->all(), [
                'cart_id' => 'required|exists:cart_items,id',
            ]);

            if ($validator->fails())
            {
                return response()->json(['message' => 'Validation error', 'errors' => $validator->errors(), 'status_code' => 400], 400);
            }


            $cartItem = CartItem::where('id', $cartID)->first();

            if (!$cartItem)
            {
                return response()->json(['message' => 'Product not found in cart', 'status_code' => 404], 404);
            }

            // Remove the product from the user's cart
            $cartItem->delete();

            return response()->json(['message' => 'Product removed from cart successfully', 'status_code' => 200], 200);
        }
        catch (\Exception $e)
        {
            return response()->json(['message' => 'Failed to remove product from cart.', 'status_code' => 500], 500);
        }
    }
    // // DB::raw('(products.price - IFNULL(products.discount, 0)) * cart_items.quantity as subtotal'),
    public function getCartItems(Request $request)
    {
        try
        {
            $userId = $request->user->id;
          
            // Fetch the cart items for the user with selected fields, product name, and calculated subtotal
            $cartItems = CartItem::cartItemsData($userId)->get();
            $dataPrices = $this->calculateTotalAndPrices($cartItems);


          if ($dataPrices->original['total_discount'] > $dataPrices->original['total']) {
               $dataPrices->original['total'] = 0;
            }
            return response()->json([
                'cart_items' => $cartItems,
                'cart_prices' => $dataPrices->original,
                'message' => 'Success',
                'status_code' => 200
            ], 200);
        }
        catch (\Exception $e)
        {
            return response()->json(['message' => 'Failed to retrieve cart items.' . $e, 'status_code' => 500], 500);
        }
    }



    public function checkOut(Request $request)
    {
        try
        {
            $userId = $request->user->id;
            $couponCode = $request->input('coupon_code');
            $coupon = Coupon::where('code', $couponCode)
                ->where('start_date', '<=', now())
                ->where(function ($query)
                {
                    $query->where('end_date', '>=', now())
                        ->orWhereNull('end_date');
                })
                ->first();


            $cartItems = CartItem::cartItemsData($userId)->get();
            $dataPrices = $this->calculateTotalAndPrices($cartItems, $coupon->discount_amount ?? 0);

            return response()->json([
                'check_out' => $dataPrices->original,
                'message' => 'Success',
                'status_code' => 200
            ], 200);
        }
        catch (\Exception $e)
        {
            return response()->json(['message' => 'Failed to retrieve data', 'status_code' => 500], 500);
        }
    }

    public function clear(Request $request)
    {
        $userId = $request->user->id;
        CartItem::where('user_id', $userId)->delete();

        return response()->json(['message' => 'Cart cleared']);
    }







    public function applyCoupon(Request $request)
    {
        // subtotal -> without total_shipping_fee
        $userId = $request->user->id;
        $couponCode = $request->input('coupon_code');
        if (!$couponCode)
        {
            return response()->json(['error' => 'Coupon code is required'], 400);
        }

        $coupon = Coupon::where('code', $couponCode)
            ->where('start_date', '<=', now())
            ->where(function ($query)
            {
                $query->where('end_date', '>=', now())
                    ->orWhereNull('end_date');
            })
            ->first();

        if (!$coupon)
        {
            return response()->json([
            'message' => 'Invalid coupon code',
            'status_code' => 400
            
            
            ], 400
            
            );
        }

        $cartItems = CartItem::cartItemsData($userId)->get();
        $dataPrices = $this->calculateTotalAndPrices($cartItems, $coupon->discount_amount ?? 0);

        return response()->json([
            'cart_prices' => $dataPrices->original,
            'coupon' => $coupon,
            'message' => 'Success',
            'status_code' => 200
        ]);
    }


    // public function calculateWeightProduct($cartItems, $country)
    // {
    //     $responsCountry = Country::where('name', $country)->first();
    //     $tax = $responsCountry->country_tax;
    //     $country_tax = 0.0;
    //     foreach ($cartItems as $item)
    //     {
    //         $country_tax += ($item->weight * $item->quantity) * $tax;
    //     }


    //     return $country_tax;
    // }
    public function calculateTotalAndPrices($cartItems, $coupon = 0)
    {
        // $total_shipping_fee = 0.0;
        $total_discount = 0.0;
        $subtotal = 0.0;
        $total = 0.0;

        foreach ($cartItems as $item)
        {
            // $total_shipping_fee += $item->shipping_fee * $item->quantity;
            // $total_discount += $item->discount * $item->quantity;
            $subtotal += $item->price * $item->quantity;
        }
        $total_discount =  (float) $coupon;
        $total = $subtotal - $total_discount;
        if ($total_discount > $total ) {
            $total = 0.0;
        }
        return response()->json([
            'total_discount' => $total_discount,
            'subtotal' => $subtotal,
            'total' => $total,

        ], 200);
    }
}

// Calculate total_country_tax based on the total weight of the products in the cart
// $total_country_tax = 0;
// foreach ($cartItems as $cartItem)
// {
//     $product = Product::find($cartItem->product_id);
//     $total_country_tax += ($product->weight * $cartItem->quantity) * $product->country_tax;
// }                // 'total_country_tax' => $total_country_tax,