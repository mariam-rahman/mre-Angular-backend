<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Sale;
use App\Models\Onsale;
use App\Models\Expense;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Purchase;
use App\Models\Substock;
use App\Models\Sale_detail;
use Illuminate\Foundation\Auth\User;




class DoshboardComponent extends Component
{

    // public $category;
    // public $products;
    // public $purchase;
    // public $main_stock_items;
    // public $substocks;
    // public $users;
    // public $customers;
    // public $expenses;
    // public $employees;
    // public $sales;
    // public $onsales;
    public $month1;
    public $month2;
    public $month3;
    public $month4;
    public $month5;
    public $month6;
    public $month7;
    public $month8;
    public $month9;
    public $month10;
    public $month11;
    public $month12;
    public $profit1;
    public $profit2;
    public $profit3;
    public $profit4;
    public $profit5;
    public $profit6;
    public $profit7;
    public $profit8;
    public $profit9;
    public $profit10;
    public $profit11;
    public $profit12;
    public $years;
    public $year_value = 2021;



    public function render()
    {
        $this->purchase = Purchase::count();
        $this->products = Product::count();
        $this->substocks = Substock::count();
        $this->category = Category::count();
        $this->main_stock_items = Purchase::where('stock_id', 1)->count();
        $this->users = User::count();
        $this->customers = Customer::count();
        $this->expenses = Expense::count();
        $this->employees = Employee::count();
        $this->sales = Sale::count();
        $this->onsales = Onsale::count();
        $this->years = Sale_detail::selectRaw('year(created_at) as y')->get();
       
        return view('livewire.dashboard.doshboard-component');
    }

    public function displayChart(){
      
        $sale_details = Sale_detail::selectRaw('SUM(sell_price) as sell_price')
        ->selectRaw('SUM(qty) as qty')
        ->selectRaw('month(created_at) as m')
        ->selectRaw('product_id')
        ->groupBy('product_id')
        ->groupBy('m')
        ->where('created_at', 'like', '%'.$this->year_value.'%')
        ->get();
        foreach($sale_details as $sell){
            $original_price = Purchase::latest()->where('product_id',$sell->product_id)->first()->price ?? 0;
            $total_orginal_price = ($sell->qty)*($original_price);
            $total_sell = $sell->sell_price;
            $profit = $total_sell - $total_orginal_price;
            switch ($sell->m) {
                case '1':
                    $this->month1 += $total_sell;
                    $this->profit1 += $profit; 
                    break;
                case '2':
                    $this->month2 += $total_sell;
                    $this->profit2 += $profit; 
                    break;
                case '3':
                    $this->month3 += $total_sell;
                    $this->profit3 += $profit; 
                    break;
                case '4':
                    $this->month4 += $total_sell;
                    $this->profit4 += $profit; 
                    break;
                case '5':
                    $this->month5 += $total_sell;
                    $this->profit5 += $profit; 
                    break;
                case '6':
                    $this->month6 += $total_sell;
                    $this->profit6 += $profit; 
                    break;
                case '7':
                    $this->month7 += $total_sell;
                    $this->profit7 += $profit; 
                    break;
                case '8':
                    $this->month8 += $total_sell;
                    $this->profit8 += $profit; 
                    break;
                case '9':
                    $this->month9 += $total_sell;
                    $this->profit9 += $profit; 
                    break;
                case '10':
                    $this->month10 += $total_sell;
                    $this->profit10 += $profit; 
                    break;
                case '11':
                    $this->month11 += $total_sell;
                    $this->profit11 += $profit; 
                    break;
                case '12':
                    $this->month12 += $total_sell;
                    $this->profit12 += $profit; 
                    break;
                default:

                    break;
            }
          }

        
         
    }
}
