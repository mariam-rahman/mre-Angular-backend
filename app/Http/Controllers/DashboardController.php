<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Expense;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Substock;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class DashboardController extends Controller
{
   
    public function index(){
        $purchase = Purchase::count();
        $products = Product::count();
        $substocks = Substock::count();
        $category = Category::count();
        $main_stock_items = Purchase::where('stock_id',1)->count();
        $users = User::count();
        $customers = Customer::count();
        $expenses = Expense::count();
        $employees = Employee::count();
        $sales = Sale::count();
        return view('admin/dashboard/index',compact('category','products','purchase','main_stock_items','substocks','users','customers','expenses','employees','sales'));
    }
}
