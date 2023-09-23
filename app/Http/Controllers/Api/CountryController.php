<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\SubMassgTest;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CountryController extends Controller
{

    public function __invoke(Request $request)
    {
    try {
        // Execute the console command
        Artisan::call('subtest:test');
        // Artisan::call('queue:work');
        // Command executed successfully
        return response()->json(['message' => 'Command executed successfully'], 200);
    } catch (\Exception $e) {
        // Handle any exceptions that may occur during command execution
        return response()->json(['message' => 'Command failed: ' . $e->getMessage()], 500);
    }
    }
}