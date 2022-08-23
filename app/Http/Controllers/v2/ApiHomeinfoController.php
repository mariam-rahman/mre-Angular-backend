<?php

namespace App\Http\Controllers\v2;

use App\Models\Homeinfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ApiHomeinfoController extends Controller
{
    function list(){
        return Homeinfo::all();
    }


    
    function add(Request $request)
    {
        Log::info($request->all());
        if ($request->id != null && $request->id != "undefined") {
            $homeinfo = Homeinfo::find($request->id);
 
            $homeinfo->category_title = $request->category_title;
            $homeinfo->category_description = $request->category_description;
            $homeinfo->product_title = $request->product_title;
            $homeinfo->product_description = $request->product_description;
            $homeinfo->address = $request->address;
            $homeinfo->phone1 = $request->phone1;
            $homeinfo->phone2 = $request->phone2;
            $homeinfo->email = $request->email;
            if ($homeinfo->update()) return response()->json(true);
            else response()->json(false);
        } else {
            $homeinfo = new Homeinfo();
            $homeinfo->category_title = $request->category_title;
            $homeinfo->category_description = $request->category_description;
            $homeinfo->product_title = $request->product_title;
            $homeinfo->product_description = $request->product_description;
            $homeinfo->address = $request->address;
            $homeinfo->phone1 = $request->phone1;
            $homeinfo->phone2 = $request->phone2;
            $homeinfo->email = $request->email;
         
            if ($homeinfo->save()) return response()->json(true);
            else response()->json(false);
        }
    }

   
    function delete($id){
        $homeinfo = Homeinfo::find($id);
        return $homeinfo->delete();
     }
}
