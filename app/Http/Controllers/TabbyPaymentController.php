<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TabbyPaymentController extends Controller
{
    public function createSession(Request $request)
    {
        // Replace these with your actual Tabby API credentials
        $apiKey = 'your_tabby_api_key';
        $merchantCode = 'your_merchant_code';
$payload = [
    "payment" => [
        "amount" => "string",
        "currency" => "AED",
        "description" => "string",
        "buyer" => [
                "phone" => "string",
                "email" => "user@example.com",
                "name" => "string",
                "dob" => "2019-08-24",
            ],
            "shipping_address" => [
                "city" => "string",
                "address" => "string",
                "zip" => "string",
            ],
        "order" => [
        "tax_amount" => "0.00",
        "shipping_amount" => "0.00",
        "discount_amount" => "0.00",
        "updated_at" => "2019-08-24T14:15:22Z",
        "reference_id" => "string",
        "items" => [
            [
                "title" => "string",
                "description" => "string",
                "quantity" => 1,
                "unit_price" => "0.00",
                "discount_amount" => "0.00",
                "reference_id" => "string",
                "image_url" => "http://example.com",
                "product_url" => "http://example.com",
                "gender" => "Male",
                "category" => "string",
                "color" => "string",
                "product_material" => "string",
                "size_type" => "string",
                "size" => "string",
                "brand" => "string",
            ],
        ],
    ],
    "buyer_history" => [
        "registered_since" => "2019-08-24T14:15:22Z",
        "loyalty_level" => 0,
        "wishlist_count" => 0,
        "is_social_networks_connected" => true,
        "is_phone_number_verified" => true,
        "is_email_verified" => true,
    ],
    ],
    "lang" => "ar",
    "merchant_code" => "string",
    "merchant_urls" => [
        "success" => "https://your-store/success",
        "cancel" => "https://your-store/cancel",
        "failure" => "https://your-store/failure",
    ],
    "create_token" => false,
    "token" => null,
    // ... (other fields)
];

        // Extract data from the request
        $payload = $request->all();

        // Make API request to create a session
        $response = Http::post('https://api.tabby.ai/v2/checkout', [
            'payment' => $payload['payment'],
            'lang' => $payload['lang'],
            'merchant_code' => $merchantCode,
            // Add other fields from the payload
            'create_token' => false,
            'token' => null,
            'merchant_urls' => [
                'success' => 'https://your-app.com/tabby/success',
                'failure' => 'https://your-app.com/tabby/failure',
            ],
        ]);

        // Handle the API response
        if ($response->successful()) {
            // Successful response, redirect to Tabby HPP
            return redirect($response['hpp_url']);
        } else {
            // Error response, handle and show an error message
            $error = $response->json(); // Convert JSON response to array
            return redirect()->back()->with('error', $error['message']);
        }



    }

    // Other methods for handling success and failure





}