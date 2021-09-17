<?php

namespace App\Http\Livewire\Purchase;

use App\Models\Product;
use App\Models\Purchase;
use Livewire\Component;

class PurchaseComponent extends Component
{
public $purchases;
public $products;
public $product_id;
public $qty;
public $price;
public $stock_id;
public $update = true;
public $purchase_id;
    public function render()
    {
        $this->purchases = Purchase::latest()->get();
        $this->products = Product::all();
        return view('livewire.purchase.purchase-component');
    }

     //Data validation
   protected $rules = [
    'product_id' => 'required',
    'qty' => 'required',
    'price' => 'required',
    'stock_id' => 'required',
       ];

     public function updated($property)
    {
    $this->validateOnly($property);
     }
   //End

    public function save(){

        $this->validate();
        $purchase = Purchase::create(['product_id'=>$this->product_id,
                                      'price'=>$this->price,
                                      'qty'=>$this->qty,
                                      'remaining_qty'=>$this->qty,
                                      'stock_id'=>$this->stock_id
        ]);
        $this->clearData();
    if($purchase)
        session()->flash('success', 'Purchase successfully created!');
    else
        session()->flash('error', 'Purchase cannot be deleted!');
        
    }

    public function delete($id){

        $purchase = Purchase::findOrFail($id);
       if ($purchase->delete()){
           session()->flash('success', 'Purchase successfully deleted!');
       }else{
        session()->flash('success', 'Purchase cannot be deleted!');
       }
    }

    public function edit($id){
        $this->update = false;
        $purchase = Purchase::findOrfail($id);
        $this->purchase_id = $id;
        $this->qty = $purchase->qty;
        $this->price = $purchase->price;
        $this->product_id = $purchase->product_id;
        $this->stock_id = $purchase->stock_id;
    }

    public function update(){
        $purchase = Purchase::findOrfail($this->purchase_id);
        $purchase->price = $this->price;
        $purchase->qty = $this->qty;
        $purchase->stock_id = $this->stock_id;
       if( $purchase->update()){
           session()->flash('success', 'Purchase successfully updated!');
       }else{
           session()->flash('error', 'Purchase cannot be updated!');
       }
       $this->clearData();
    }

    public function clearData(){
    
    $this->product_id = null;
    $this->qty = null;
    $this->price = null;
    $this->stock_id = null;
    
    }




}
