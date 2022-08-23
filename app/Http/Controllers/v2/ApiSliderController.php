<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class ApiSliderController extends Controller
{
    function SubTitleList(){
        return Slider::all();
    }
}
