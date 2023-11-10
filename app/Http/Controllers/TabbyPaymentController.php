<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TabbyPaymentController extends Controller
{

function makePayment(Request $request)
{
    $orderId = $request->order_id;
    $order = Order::find($orderId);
    // Configuration
    $sanboxURL = env('SANDBOX_URL', 'https://skipcashtest.azurewebsites.net/api/v1/payments');
    $secretkey = env('SECRET_KEY');
    $keyId = env('KEY_ID', '7fbb70f1-5252-409a-90ba-2fa0f581dc6e');

    // Generate UUID
    $myuuid = Str::uuid()->toString();

    // Prepare data
    $data = [
        'Uid' => $myuuid,
        'KeyId' => $keyId,
        'Amount' => (string) $order->total ??"500",
        // $request->price,
        'FirstName' => 'Abdullah',
        'LastName' => 'Agha',
        'Phone' => '33221133',
        'Email' => 'name@domain.com',
        'TransactionId' => 'event2310_33221133',
    ];

    // Generate the signature
    $resultheader = "Uid={$data['Uid']},KeyId={$data['KeyId']},Amount={$data['Amount']},FirstName={$data['FirstName']},LastName={$data['LastName']},Phone={$data['Phone']},Email={$data['Email']},TransactionId={$data['TransactionId']}";
    $s = hash_hmac('sha256', $resultheader, $secretkey, true);
    $authorisationheader = base64_encode($s);

    // Make the API request using Laravel's HTTP Client
    try {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => $authorisationheader,
        ])->post($sanboxURL, $data);

        return redirect($response["resultObj"]["payUrl"]); // or handle response as needed
    } catch (\Exception $e) {
        // Handle exceptions
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
   





   public function cancelSkip(Request $request)
    {
        $orderId = $request->order_id;
        $order = Order::find($orderId);
        $order->payment_status = 'failed';
        $order->payment_method = 'skipcash';
        $order->cancelled = true;
        $order->save();
        return response()->json([
            'status_code' => 200,
            'message' => 'Payment is canceled',
        ], 200);
    }

    public function successSkip(Request $request)
    {
    

        if ("" =="")
        {
            $orderId = $request->query('order_id');
            $order = Order::find($orderId);
            $order->payment_status = 'paid';
            $order->payment_method = 'skipcash';
            $order->save();
            return view("sucss-page");
        }

        return response()->json(['message' => 'Please try again later.'], 500);
    }




















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