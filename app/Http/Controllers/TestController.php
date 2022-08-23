<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    function test(Request $request){
        Log::info('user data', $request->all());

        return true;
    }
}
