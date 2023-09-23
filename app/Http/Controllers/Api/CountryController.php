<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\SubMassgTest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function __invoke(Request $request)
    {
        for ($i=0; $i < 5; $i++) { 
            dispatch(new SubMassgTest($i));
        }
    }
}