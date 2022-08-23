<?php

namespace App\Http\Livewire\Sell;

use App\Models\Sale;
use App\Models\Onsale;
use App\Models\Payment;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Substock;
use App\Models\Sale_detail;


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
    public $sale_id_record;
    public $totalPayment = 0.0;
    public $paid = 0.0;

    //add product
    public $sell_id;
    public $product_id;
    public $qty;
    public $sell_price;
    public $sellEdit;
    public $payment_record;

    public function render()
    {
        $this->sales = Sale::latest()->get();
        return view('livewire.sell.sell-component');
    }
    //Data validation
    protected $rules = [
        "sell_price" => "required",
        'product_id' => 'required',
        'qty' => 'required'
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }
    //End
    function sellOption()
    {
        $this->customers = Customer::all();
        $this->visible = 1;
    }



    function sellCreate()
    {
        $this->validate(['customer_id'=>'required',
                          'stock_id'=>'required'  ]);
                          
        $this->sale = Sale::create(
            [
                'customer_id' => $this->customer_id,
                'stock_id' => $this->stock_id
            ]
        );

        $this->visible = 3;
    }



    public function sell($sell_id, $stock_id)
    {
        $this->validate();
        $this->sell_id = $sell_id;
        $this->stock_id = $stock_id;
        $purchases = null;
        $countQty = null;
        if ($this->stock_id == 3) {
            $countQty = $this->getQtyCount3($this->product_id);
            $purchases = Onsale::where('product_id', $this->product_id)->where('remaining_qty', '>', 0)->get();
        } elseif ($this->stock_id == 2) {
            $countQty = $this->getQtyCount2($this->product_id);
            $purchases = Substock::where('product_id', $this->product_id)->where('remaining_qty', '>', 0)->get();
        } else {
            $countQty = $this->getQtyCount1($this->product_id);
            $purchases = Purchase::where('product_id', $this->product_id)->where('remaining_qty', '>', 0)->get();
        }


        $qty = $this->qty;
        $cqty = $qty;
        if ($qty > $countQty) {
            session()->flash('error', 'There is no sufficient products');
        }

        foreach ($purchases as $purchase) {
            $remain = $purchase->remaining_qty;
            if ($remain == 0 || $remain < 0) continue;

            $remainQty = $cqty - $remain;

            if ($remainQty <= 0) {

                $purchase->remaining_qty = - ($remainQty);
                $purchase->update();

                $sellD = new Sale_detail();
                $sellPrice = ($this->qty) * ($this->sell_price);
                $sellD->sell_price = $sellPrice;
                $sellD->sale_id = $this->sell_id;
                $sellD->product_id = $this->product_id;
                $sellD->qty = $this->qty;
                $sellD->save();
                session()->flash('success', 'Product added!');
                $this->resetInputFields();
                $this->sale = Sale::find($this->sell_id);
                break;
            }

            if ($remainQty > 0) {
                $purchase->remaining_qty = 0;
                $purchase->update();

                $sellD = new Sale_detail();
                $sellPrice = ($this->qty) * ($this->sell_price);
                $sellD->sell_price = $sellPrice;
                $sellD->sale_id = $this->sell_id;
                $sellD->product_id = $this->product_id;
                $sellD->qty = $remain;
                $sellD->save();
                $cqty = $remainQty;
                continue;
            }
        }
        $this->resetInputFields();
    }

    public function getQtyCount1($product_id)
    {
        return Purchase::Where('product_id', $product_id)
            ->selectRaw("SUM(remaining_qty) as remaining_qty")
            ->selectRaw("product_id")
            ->groupBy('product_id')
            ->first()->remaining_qty ?? 0;
    }
    public function getQtyCount2($product_id)
    {
        return Substock::Where('product_id', $product_id)
            ->selectRaw("SUM(remaining_qty) as remaining_qty")
            ->selectRaw("product_id")
            ->groupBy('product_id')
            ->first()->remaining_qty ?? 0;
    }
    public function getQtyCount3($product_id)
    {
        return Onsale::Where('product_id', $product_id)
            ->selectRaw("SUM(remaining_qty) as remaining_qty")
            ->selectRaw("product_id")
            ->groupBy('product_id')
            ->first()->remaining_qty ?? 0;
    }


    public function resetInputFields()
    {
        $this->qty = null;
        $this->sell_price = null;
        $this->product_id = null;
    }

    //code for sale Details

    public function sell_details($id)
    {

        $this->sale = Sale::find($id);

        $this->payment_record = Payment::Where('sale_id',$id)->first();

        $this->visible = 2;
    }

    public function sale_deatails_Edit($sale_id)
    {
        $this->sellEdit = Sale_detail::find($sale_id);
        $this->product_id = $this->sellEdit->product->id;
        $this->qty = $this->sellEdit->qty;
        $this->sell_price = $this->sellEdit->sell_price;
        $this->sale_id_record = $this->sellEdit->id;
    }


    function deleteProduct($product_id,$sale_id,$qty,$stock_id){
        $product = null;
     
        if ($stock_id == 3) {
           $product = Onsale::Where('product_id', $product_id)->first();
        } elseif ($stock_id == 2) {
           $product = Substock::Where('product_id', $product_id)->first();
        } else {
           $product = Purchase::Where('product_id', $product_id)->first();
        }
          if(Sale_detail::destroy($sale_id))
          {
              $product->remaining_qty = $product->remaining_qty+$qty;
              $product->update();
              session()->flash('info', 'Product successfully deleted!');
              return;
          }
          session()->flash('error', 'Product cannot be deleted!');

    }

    function changeState(){
        $this->visible = 4;
        foreach($this->sale->sell_details as $sell) 
        $this->totalPayment += $sell->sell_price;
    } 
    public function goBack(){ 
        $this->visible = 0;
    }

    public function goBack2(){
        $this->visible = 5;
        $this->totalPayment = 0.0;
    }

    public function savePayment(){
        $payment = new Payment();
        $payment->customer_id = $this->sale->customer_id;
        $payment->sale_id = $this->sale->id;
        $payment->debt = ($this->totalPayment) - ($this->paid);
        $payment->paid = $this->paid;
        $payment->save();
        redirect()->route('sale.invoice',$this->sale->id);
    }

    public function delete($sell_id){
        $sell = Sale::findOrfail($sell_id);
        if(count($sell->sell_details)>0){
            session()->flash('error', 'You cannot delete this Permission, it has been used for user/users!');
        }
        else{
            $sell->delete();
            session()->flash('success', 'sale Record has been deleted successfully!');

        }
    }
}
