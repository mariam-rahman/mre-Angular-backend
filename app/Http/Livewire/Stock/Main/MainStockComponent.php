<?php

namespace App\Http\Livewire\Stock\Main;

use Livewire\Component;
use App\Models\Purchase;
use App\Models\Substock;

class MainStockComponent extends Component
{
    public $purchases;
    public $items;
    public $stocks;
    public $visible = 0;
    public $move_qty;
    public $product_id;
    public function render()
    {
        $this->purchases = Purchase::selectRaw("SUM(qty) as qty")
        ->selectRaw("SUM(price) as price")
        ->selectRaw("SUM(remaining_qty) as remaining_qty")
        ->selectRaw("product_id")
        ->groupBy('product_id')
        ->where('stock_id', 1)
        ->get();
        return view('livewire.stock.main.main-stock-component');
    }


    public function details($product_id){
            
        $this->stocks = Purchase::selectRaw("SUM(qty) as qty")
        ->selectRaw("SUM(remaining_qty) as remaining_qty")
        ->selectRaw("product_id")
        ->groupBy('product_id')
        ->where('product_id',$product_id)->first();

        //this code is for details
        $this->items = Purchase::where('product_id',$product_id)
        ->where('stock_id',1)->get();
        $this->visible = 1;
        
    }


    public function moveTo()
    {
        $product_id = $this->product_id;
        $this->validate([
            'move_qty'=>'required'
        ]);
        $countQty = Purchase::Where('stock_id', 1)->where('product_id', $product_id)
            ->selectRaw("SUM(qty) as qty")
            ->selectRaw("SUM(price) as price")
            ->selectRaw("SUM(remaining_qty) as remaining_qty")
            ->selectRaw("product_id")
            ->groupBy('product_id')
            ->first()->remaining_qty;

        $qty = $this->move_qty;
        $cqty = $qty;
        if ($qty > $countQty) {
            return redirect(route('stock.moveForm', $product_id));
        }

        $purchases = Purchase::where('product_id', $product_id)->get();

        foreach ($purchases as $purchase) {
            $remain = $purchase->remaining_qty;
            if ($remain == 0 || $remain < 0) continue;

            $remainQty = $cqty - $remain;

            if ($remainQty <= 0) {

                $purchase->remaining_qty = - ($remainQty);
                $purchase->update();

                $sub = new Substock();
                $sub->product_id = $product_id;
                $sub->purchase_id = $purchase->id;
                $sub->qty = $cqty;
                $sub->remaining_qty = $cqty;
                $sub->stock_id = 2;
                $sub->save();
                break;
            }

            if ($remainQty > 0) {
                $purchase->remaining_qty = 0;
                $purchase->update();

                $sub = new Substock();
                $sub->purchase_id = $purchase->id;
                $sub->product_id = $product_id;
                $sub->qty = $remain;
                $sub->remaining_qty = $remain;
                $sub->stock_id = 2;
                $sub->save();
                $cqty = $remainQty;
                continue;
            }
        }
        $this->clearData();
    }


public function setProductId($id){
    $this->product_id = $id;
}

public function goBack(){
    $this->visible = 0;    
}

public function clearData(){
    $this->move_qty = null;
}
}
