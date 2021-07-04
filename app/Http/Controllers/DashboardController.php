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
        $main_stock_items = Purchase::where('stock_id',1)->count();
        $sub_stock_items = Purchase::where('stock_id',3)->count();
        return view('admin/dashboard/index',compact('category','stocks','products','purchase','main_stock_items','sub_stock_items'));
    }
}
