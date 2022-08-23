<?php

namespace App\Http\Controllers\v2;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ApiBannerController extends Controller
{

    function list()
    {
        return Banner::all();
    }

    function add(Request $request)
    {
        if ($request->id != null && $request->id != "") {
            $banner = Banner::find($request->id);
            if ($request->avatar != null && $request->avatar != "undefined") {
                $oldimage = "storage/" . $banner->image;
                if (File::exists($oldimage)) 
                    File::delete($oldimage);

                    $image_path = $request->avatar->store('images/banner', 'public');
                    $banner->image = $image_path;
                
            }
            $banner->title = $request->title;
            $banner->sub_title = $request->sub_title;
            $banner->description = $request->description;
            if ($banner->update()) return response()->json(true);
            else response()->json(false);
        } else {
            $image_path = $request->avatar->store('images/banner', 'public');
            $banners = new Banner();
            $banners->title = $request->title;
            $banners->sub_title = $request->sub_title;
            $banners->description = $request->description;
            $banners->image = $image_path;
            if ($banners->save()) return response()->json(true);
            else response()->json(false);
        }
    }

    function delete($id)
    {
        $banners = Banner::find($id);
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
