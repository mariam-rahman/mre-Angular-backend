<?php

namespace App\Http\Controllers\v2;

use App\Models\Webproduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ApiWebproductController extends Controller
{
    function list(){
        return Webproduct::all();
    }



    function add(Request $request)
    {
        Log::info($request->all());
        if ($request->id != null && $request->id != "undefined") {
            $product = Webproduct::find($request->id);
            if ($request->avatar != null && $request->avatar != "undefined") {
                $oldimage = "storage/" . $product->image;
                if (File::exists($oldimage)) 
                    File::delete($oldimage);

                    $image_path = $request->avatar->store('images/webProduct', 'public');
                    $product->image = $image_path;
                
            }
            $product->name = $request->name;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            if ($product->update()) return response()->json(true);
            else response()->json(false);
        } else {
            $image_path = $request->avatar->store('images/webProduct', 'public');
            $product = new Webproduct();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->image = $image_path;
            if ($product->save()) return response()->json(true);
            else response()->json(false);
        }
    }

    function delete($id){
       $webProduct = Webproduct::find($id);
       return $webProduct->delete();
    }


    function categoryFilter($id){
           $categoryFiltter = Webproduct::where('category_id', '=', $id)->get();
           return $categoryFiltter;
    }




}
