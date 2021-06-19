<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin/category/index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "create form";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->image !=""){
            $image_path = $request->image->store('images/category','public');
            Category::create(array_merge($request->except('image'),
                                           ['image'=>$image_path]));
        }
        else{
            Category::create($request->all());
        }

        return redirect(route('category.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)

    {
       return view('admin/category/edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if($request->image !=""){
            $oldimage = "storage/".$category->image;
            if(File::exists($oldimage)){
                File::delete($oldimage);     
            }
            $newimage = $request->image->store('images/category','public');
          $category->updated(array_merge($request->except('image'),
                                         ['image'=>$newimage]));
        }
        else{
             $category->updated($request->all());
         }
            $var = 5;
          return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

     
    public function destroy(Category $category)
    {
       if($category->image !="")
       {
          $image_path = "storage/".$category->image;
          if(File::exists($image_path))
          {
              File::delete($image_path);
          }
          $category->delete();
       }
       return redirect(route('category.index'));
    }
    
}
