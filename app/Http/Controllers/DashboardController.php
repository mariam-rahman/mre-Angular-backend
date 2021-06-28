<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Stock;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   
    public function index(){
        $purchase = Purchase::count('id');
        $products = Product::count('id');
        $stocks = Stock::count('id');
        $category = Category::count('id');
        return view('admin/dashboard/index',compact('category','stocks','products','purchase'));
    }
}
