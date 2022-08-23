<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::latest()->get();
        // $data = Category::all();
        // $count = Category::count();
        // return array(
        //    'data'=>$data,
        //    'count'=>$count,
        // );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info('category save',$request->all());
        $categories = new Category();
        $categories->title = $request->title;
        $categories->desc = $request->desc;
        $categories->save();
        return response()->json(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        try {
            $category = Category::find($id);
            $category->title = $request->title;
            $category->desc = $request->desc;
            $category->update();
        } catch (\Exception $e) {
            return response()->json(false);
        }
      
        return response()->json(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Category $category)
    // {
    //     Log::info('category id',[$category]);
    //    $category = Category::find($category);
    //    $category->product()->delete();
    //    $category->delete();
    //    return response()->json(true);
    // }


    function categoryDelete($id){
        Log::info(['category id',$id]);
        $category = Category::find($id);
      $category->products()->delete();
       return $category->delete();
        
    }
}
