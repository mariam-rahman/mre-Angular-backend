<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Expense;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class DashboardController extends Controller
{
   
    public function index(){
        $purchase = Purchase::count('id');
        $products = Product::count('id');
        $stocks = Stock::count('id');
        $category = Category::count('id');
        $main_stock_items = Purchase::where('stock_id',1)->count();
        $sub_stock_items = Purchase::where('stock_id',3)->count();
        $users = User::count('id');
        $customers = Customer::count('id');
        $expenses = Expense::count('id');
        $employees = Employee::count('id');
        return view('admin/dashboard/index',compact('category','stocks','products','purchase','main_stock_items','sub_stock_items','users','customers','expenses','employees'));
    }
}
