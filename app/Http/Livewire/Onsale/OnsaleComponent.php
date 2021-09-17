<?php

namespace App\Http\Livewire\Onsale;

use App\Models\Onsale;
use Livewire\Component;

class OnsaleComponent extends Component
{
    public $onsales;
    public $isVisible = true;
    public $onsaleInfo;
    public $onsals;
    public function render()
    {
        $this->onsales = Onsale::selectRaw("SUM(qty) as qty")
        ->selectRaw("SUM(remaining_qty) as remaining_qty")
        ->selectRaw("product_id")
        ->groupBy('product_id')
        ->get();
        return view('livewire.onsale.onsale-component');
    }

    function details($product_id){
        $this->onsaleInfo = Onsale::selectRaw("SUM(qty) as qty")
        ->selectRaw("SUM(remaining_qty) as remaining_qty")
        ->selectRaw("product_id")
        ->groupBy("product_id")
        ->where("product_id",$product_id)->first();
    $this->onsals = Onsale::where('product_id',$product_id)->get();
    $this->isVisible = false;
    }
}
