<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Homeinfo;
use App\Models\Product;
use App\Models\Webcategory;
use App\Models\Webpage;
use App\Models\Webproduct;
use Illuminate\Http\Request;

class ApiWebpageController extends Controller
{
    function bannerlist(){
        return Banner::all();
    }

    function categorylist(){
        return Webcategory::all();
    }

    function productlist(){
        return Webproduct::all();
    }

    function homeinfolist(){
        return Homeinfo::all();
    }

  function filter($category){
    return $posts = Webproduct::where('category_id',$category)->get();
  }


}
