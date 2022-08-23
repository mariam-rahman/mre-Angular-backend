<?php

namespace App\Http\Controllers\v2;

use App\Models\WebCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ApiWebCategoryController extends Controller
{
    function list(){
        return WebCategory::all();
    }

  
    function add(Request $request)
    {
        if ($request->id != null && $request->id != "undefined") {
            $banner = WebCategory::find($request->id);
            if ($request->avatar != null && $request->avatar != "undefined") {
                $oldimage = "storage/" . $banner->image;
                if (File::exists($oldimage)) 
                    File::delete($oldimage);

                    $image_path = $request->avatar->store('images/webcategory', 'public');
                    $banner->image = $image_path;
                
            }
            $banner->cat_name = $request->cat_name;
            $banner->description = $request->description;
            if ($banner->update()) return response()->json(true);
            else response()->json(false);
        } else {
            $count = WebCategory::count();
            if($count<=5)
            {
                $image_path = $request->avatar->store('images/webcategory', 'public');
                $banners = new WebCategory();
                $banners->cat_name = $request->cat_name;
                $banners->description = $request->description;
                $banners->image = $image_path;
                if ($banners->save()) return response()->json(true);
                else response()->json(false);
            }
            else return false;
            
        }
    }


    
    function delete($id)
    {
        $banners = WebCategory::find($id);
        if ($banners->image != "") {
            $image_path = "storage/" . $banners->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        $banners->delete();
        return response(true);
    }




}
