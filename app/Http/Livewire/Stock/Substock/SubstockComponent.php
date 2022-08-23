<?php

namespace App\Http\Livewire\Stock\Substock;

use App\Models\Onsale;
use Livewire\Component;
use App\Models\Substock;

class SubstockComponent extends Component
{

    public $substocks; 
    public $move_qty;
    public $visible = 0;
    public  $substock; 
    public $items;
    public $product_id;
    public $discount;
    public $sell_price;


    public function render()
    {
        $this->substocks = Substock::selectRaw("SUM(qty) as qty")
        ->selectRaw("SUM(remaining_qty) as remaining_qty")
        ->selectRaw("product_id")
        ->groupBy('product_id')
        ->get();
        return view('livewire.stock.substock.substock-component');
    }

    public function details($product_id){
        $this->visible = 1;
        $this->substock = Substock::selectRaw("SUM(qty) as qty")
        ->selectRaw("SUM(remaining_qty) as remaining_qty")
        ->selectRaw("product_id")
        ->groupBy('product_id')
        ->where('product_id',$product_id)->first();
        
           $this->items = Substock::where('product_id',$product_id)->get();
        
    }

    public function moveToSell(){
        $this->validate([
            'move_qty'=>'required|integer',
            'discount'=>'required|integer',
            'sell_price'=>'required|integer'
        ]);
        $countQty = Substock::Where('product_id', $this->product_id)
        ->selectRaw("SUM(remaining_qty) as remaining_qty")
        ->selectRaw("product_id")
        ->groupBy('product_id')
        ->first()->remaining_qty;

    $qty = $this->move_qty;
    $cqty = $qty;
    if ($qty > $countQty) {
        session()->flash('error','There is no sufficient products');
        return;
    }

    $purchases = Substock::where('product_id', $this->product_id)->get();

    foreach ($purchases as $purchase) {
        $remain = $purchase->remaining_qty;
        if ($remain == 0 || $remain < 0) continue;

        $remainQty = $cqty-$remain;

        if($remainQty <= 0){

            $purchase->remaining_qty = -($remainQty);
            $purchase->update();

            $sub = new Onsale();
            $sub->product_id = $this->product_id;
            $sub->qty = $cqty;
            $sub->remaining_qty = $cqty;
            $sub->stock_id = 2;
            $sub->sell_price = $this->sell_price;
            $sub->discount = $this->discount;
            $sub->save();
            break;
        }
    

        if($remainQty > 0){
            $purchase->remaining_qty = 0;
            $purchase->update();

            $sub = new Onsale();
            $sub->product_id = $this->product_id;
            $sub->qty = $remain;
            $sub->remaining_qty = $remain;
            $sub->stock_id = 2;
            $sub->sell_price = $this->sell_price;
            $sub->discount = $this->discount;
            $sub->save();
            $cqty = $remainQty;
            continue;
        }
    }
   
    $this->product_id = null;
    $this->clearData();
     return;
    
    }



     function setId($id){
        $this->product_id = $id;
    }
    function goBack(){
        $this->visible = 0;
    }

    public function clearData(){
        $this->move_qty = null;
        $this->discount = null;
        $this->sell_price = null;
    }
}
