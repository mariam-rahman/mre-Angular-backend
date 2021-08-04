<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MresController extends Controller
{
    public function view_category(){

        $categories = Category::all();
        $products = Product::all();
        return view('view/index1',compact('categories','products'));
    }

    public function about(){
        return view('view/about');
    }

    
    public function contact(){
        return view('view/contact');
    }


    public function view_product(){
        $categories = Category::all();
        $products = Product::all();
        return view('view/view_product',compact('categories','products'));
    }

    public function category_filter($category){
       
        $categories = Category::all();
        $products = Product::where('category_id',$category)->get();
        return view('view/view_product',compact('products','categories'));

    }

    
}
