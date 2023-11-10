<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;

class PayPalController extends Controller
{


        public function getAccessToken()
    {
        // Retrieve Sadad credentials from environment variables
        $sadadId = env('SADAD_SADAD_ID');
        $secretKey = env('SADAD_SECRET_KEY');
        $domain = env('SADAD_REGISTERED_DOMAIN');

        // Define the request data for getting the access token
        $requestData = [
            'sadadId' => $sadadId,
            'secretKey' => $secretKey,
            'domain' => $domain,
        ];

        // Make a POST request to the Sadad login endpoint
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://api-s.sadad.qa/api/userbusinesses/login', $requestData);

        // Check for a successful response
        if ($response->successful()) {
            $accessToken = $response->json('accessToken');

            // You can store the access token in a session, database, or cache for later use
            // For example, if using the session:
            session(['sadad_access_token' => $accessToken]);

            return $accessToken;
        } else {
            // Handle the error response from Sadad
            // You can log the error or display an error message to the user
            return null; // Return null or handle the error as needed
        }
    }

    public function processPayment()
    {
        // Retrieve Sadad credentials from environment variables
        $secretKey = env('SADAD_SECRET_KEY');
        $sadadId = env('SADAD_SADAD_ID');
        $registeredDomain = env('SADAD_REGISTERED_DOMAIN');
        $type = env('SADAD_TYPE');

        // Define the request data
        $requestData = [
            'sadadId' => $sadadId,
            'secretKey' => $secretKey,
            'domain' => $registeredDomain,
        ];
        $yourAccessToken = "";
        // Define custom headers (if needed)
        $customHeaders = [
            'Authorization' => 'Bearer ' . $yourAccessToken,
            'Custom-Header' => 'Custom-Value',
            'Content-Type: application/json',
        ];

        // Make a POST request to the Sadad API with custom headers
        $response = Http::withHeaders($customHeaders)
            ->post('https://api.sadadqatar.com/api-v4/userbusinesses/getsdktoken', $requestData);

        // Check for a successful response
        if ($response->successful()) {
            $sdkToken = $response->json(); // Extract SDK token from the response

            // Handle the SDK token and continue with payment processing logic
            // You can return a view or redirect the user to the payment page here
        } else {
            // Handle the error response from Sadad
            // You can log the error or display an error message to the user
            return back()->with('error', 'Failed to retrieve SDK token from Sadad.');
        }
    }

}