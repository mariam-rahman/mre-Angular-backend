<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Expense;
use App\Models\Onsale;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Sale_detail;
use App\Models\Substock;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class DashboardController extends Controller
{


    function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $sale_details = Sale_detail::selectRaw('SUM(sell_price) as sell_price')
        ->selectRaw('SUM(qty) as qty')
        ->selectRaw('month(created_at) as m')
        ->selectRaw('product_id')
        ->groupBy('product_id')
        ->groupBy('m')->get();

   
        $purchase = Purchase::count();
        $products = Product::count();
        $substocks = Substock::count();
        $category = Category::count();
        $main_stock_items = Purchase::where('stock_id', 1)->count();
        $users = User::count();
        $customers = Customer::count();
        $expenses = Expense::count();
        $employees = Employee::count();
        $sales = Sale::count();
        $onsales = Onsale::count();
        $years = Sale_detail::selectRaw('year(created_at) as y')
        ->groupBy('y')
        ->get();

    
      //Analytics
      $month1= 0;
      $month2= 0;
      $month3= 0;
      $month4= 0;
      $month5= 0;
      $month6= 0;
      $month7= 0;
      $month8= 0;
      $month9= 0;
      $month10= 0;
      $month11= 0;
      $month12= 0;

        $sale_details = Sale_detail::selectRaw('SUM(sell_price) as sell_price')
        ->selectRaw('SUM(qty) as qty')
        ->selectRaw('month(created_at) as m')
        ->selectRaw('product_id')
        ->groupBy('product_id')
        ->groupBy('m')
        ->where('created_at', 'like', '%'.'2022'.'%')
        ->get();
        foreach($sale_details as $sell){
            $total_sell = ($sell->sell_price)*($sell->qty);
            switch ($sell->m) {
                case '1':
                    $month1 += $total_sell;
                    break;
                case '2':
                    $month2 += $total_sell;
                    break;
                case '3':
                    $month3 += $total_sell;
                    break;
                case '4':
                    $month4 += $total_sell;
                    break;
                case '5':
                    $month5 += $total_sell;
                    break;
                case '6':
                    $month6 += $total_sell;
                    break;
                case '7':
                    $month7 += $total_sell;
                    break;
                case '8':
                    $month8 += $total_sell;
                    break;
                case '9':
                    $month9 += $total_sell;
                    break;
                case '10':
                    $month10 += $total_sell;
                    break;
                case '11':
                    $month11 += $total_sell;
                    break;
                case '12':
                    $month12 += $total_sell;
                    break;
                default:

                    break;
            }
          }
       
   
    }

    public function chart_value(Request $request){  

        $purchase = Purchase::count();
        $products = Product::count();
        $substocks = Substock::count();
        $category = Category::count();
        $main_stock_items = Purchase::where('stock_id', 1)->count();
        $users = User::count();
        $customers = Customer::count();
        $expenses = Expense::count();
        $employees = Employee::count();
        $sales = Sale::count();
        $onsales = Onsale::count();
        $years = Sale_detail::selectRaw('year(created_at) as y')
        ->groupBy('y')
        ->get();
        
      // //Analytics
      $month1= 0;
      $profit1 = 0.0;
      $month2= 0;
      $profit2 = 0.0;
      $month3= 0;
      $profit3 = 0;
      $month4= 0;
      $profit4 = 0;
      $month5= 0;
      $profit5 = 0; 
      $month6= 0;
      $profit6 = 0; 
      $month7= 0;
      $profit7 = 0;
      $month8= 0;
      $profit8 = 0;
      $month9= 0;
      $profit9 = 0;
      $month10= 0;
      $profit10 = 0;
      $month11= 0;
      $profit11 = 0;
      $month12= 0;
      $profit12 = 0;
      $year_value = 0;


        $sale_details = Sale_detail::selectRaw('SUM(sell_price) as sell_price')
        ->selectRaw('SUM(qty) as qty')
        ->selectRaw('month(created_at) as m')
        ->selectRaw('product_id')
        ->groupBy('product_id')
        ->groupBy('m')
        ->where('created_at', 'like', '%'.$request->year_value.'%')
        ->get();
        foreach($sale_details as $sell){
         $original_price = Purchase::latest()->where('product_id',$sell->product_id)->first()->price ?? 0;
        $total_orginal_price = ($sell->qty)*($original_price);
            $total_sell = $sell->sell_price;
            $profit = $total_sell - $total_orginal_price;
           
            switch ($sell->m) {
                case '1':
                    $month1 += $total_sell;
                    $profit1 += $profit; 
                    break;
                case '2':
                    $month2 += $total_sell;
                    $profit2 += $profit; 
                    break;
                case '3':
                    $month3 += $total_sell;
                    $profit3 += $profit; 
                    break;
                case '4':
                    $month4 += $total_sell;
                    $profit4 += $profit; 
                    break;
                case '5':
                    $month5 += $total_sell;
                    $profit5 += $profit; 
                    break;
                case '6':
                    $month6 += $total_sell;
                    $profit6 += $profit; 
                    break;
                case '7':
                    $month7 += $total_sell;
                    $profit7 += $profit; 
                    break;
                case '8':
                    $month8 += $total_sell;
                    $profit8 += $profit; 
                    break;
                case '9':
                    $month9 += $total_sell;
                    $profit9 += $profit; 
                    break;
                case '10':
                    $month10 += $total_sell;
                    $profit10 += $profit; 
                    break;
                case '11':
                    $month11 += $total_sell;
                    $profit11 += $profit; 
                    break;
                case '12':
                    $month12 += $total_sell;
                    $profit12 += $profit; 
                    break;
                default:

                    break;
            }
          }
          return view('admin/dashboard/index',compact('purchase','products','substocks','category','main_stock_items'
          ,'users','customers','expenses','employees','sales','onsales','years',
          'month1','month2','month3','month4','month5','month6','month7','month8','month9','month10','month11','month12'
          ,'profit1','profit2','profit3','profit4','profit5','profit6','profit7','profit8','profit9','profit10','profit11','profit12'));
        }




}
