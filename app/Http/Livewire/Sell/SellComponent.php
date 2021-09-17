<?php

namespace App\Http\Livewire\Sell;

use App\Models\Sale;
use Livewire\Component;
use App\Models\Customer;

class SellComponent extends Component
{
    public $sales;
    public $visible = 0;
    public $customers;

    //Sell option
    public $customer_id;
    public $stock_id;
    public $sell_date;
    public $sale;
   
    public function render()
    {
        $this->sales = Sale::latest()->get();
        return view('livewire.sell.sell-component');
    }

    function sellOption(){
        $this->customers = Customer::all();
        $this->visible = 1;
        
    }

    function sellCreate(){
        // $this->sale = new Sale();
        // $this->sale->customer_id = $this->customer_id;
        // $this->sale->stock_id = $this->stock_id;
        // $this->sale->sell_date = $this->sell_date;
        // $this->sale->save();


       $this->sale = Sale::create(['customer_id'=>$this->customer_id,
                      'sell_date'=>$this->sell_date,
                      'stock_id'=>$this->stock_id]
    );
  
        $this->visible = 2;
    }

}
