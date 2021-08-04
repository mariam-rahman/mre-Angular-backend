<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Onsale;
use App\Models\Customer;
use App\Models\Product;

use App\Models\Purchase;
use App\Models\Substock;
use App\Models\Sale_detail;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::latest()->get();
        return view('admin/sale/index',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('admin/sale/optionForm',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale = new Sale();
        $sale->customer_id = $request->customer_id;
        $sale->stock_id = $request->stock_id;
        $sale->sell_date = $request->sell_date;
        $sale->save();
        return view('admin/sale/sellForm',compact('sale'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function details($product_id){
        $total_sale = Sale::selectRaw("SUM(qty) as qty")
        ->selectRaw("product_id")
        ->groupBy("product_id")
        ->where('product_id',$product_id)->first();

        $items = Sale::where('product_id',$product_id)->get();
    
        return view('admin/sale/item_detail',compact('items','total_sale'));

    }


public function saleCustomer($customer_id){
    $sales = Sale::selectRaw("SUM(qty) as qty")
    ->selectRaw("customer_id")
    ->selectRaw("product_id")
    ->groupBy("customer_id")
    ->groupBy("product_id")
    ->get();

    return view('admin/sale/soldTo_customer',compact('sales'));

}


    public function showSellForm($sale_id){
        return view('admin/sale/sellForm',compact('sale_id'));
    }

    // public function sell(Request $request){
    //     $sellD = new Sale_detail();
    //     $sellPrice = ($request->qty)*($request->sell_price);
    //     $sellD->sell_price = $sellPrice;
    //     $sellD->sale_id = $request->sell_id;
    //     $sellD->product_id = $request->product_id;
    //     $sellD->qty = $request->qty;
    //     $sellD->save();
    //     $sale = Sale::find($request->sell_id);
    //     return view('admin/sale/sellForm',compact('sale'));
    // }


    public function sell(Request $request){
    $purchases = null;
    $countQty = null;

    if($request->stock_id==3)
    {
        $countQty = $this->getQtyCount3($request->product_id);
        $purchases = Onsale::where('product_id', $request->product_id)->where('remaining_qty','>',0)->get();
    }
     elseif($request->stock_id == 2)
     {
        $countQty = $this->getQtyCount2($request->product_id);
        $purchases = Substock::where('product_id', $request->product_id)->where('remaining_qty','>',0)->get();
 
     }
     else
     {
        $countQty = $this->getQtyCount1($request->product_id);
        $purchases = Purchase::where('product_id', $request->product_id)->where('remaining_qty','>',0)->get();
  
    }
    

     $qty = $request->qty;
     $cqty = $qty;
     if ($qty > $countQty) {
         $sale = Sale::find($request->sell_id);
         return view('admin/sale/sellForm',compact('sale'));
     }

     foreach ($purchases as $purchase) {
        $remain = $purchase->remaining_qty;
        if ($remain == 0 || $remain < 0) continue;

        $remainQty = $cqty-$remain;

        if($remainQty <= 0){

            $purchase->remaining_qty = -($remainQty);
            $purchase->update();

            $sellD = new Sale_detail();
            $sellPrice = ($request->qty)*($request->sell_price);
            $sellD->sell_price = $sellPrice;
            $sellD->sale_id = $request->sell_id;
            $sellD->product_id = $request->product_id;
            $sellD->qty = $request->qty;
            $sellD->save();
            break;
        }

        if($remainQty > 0){
            $purchase->remaining_qty = 0;
            $purchase->update();

            $sellD = new Sale_detail();
            $sellPrice = ($request->qty)*($request->sell_price);
            $sellD->sell_price = $sellPrice;
            $sellD->sale_id = $request->sell_id;
            $sellD->product_id = $request->product_id;
            $sellD->qty = $remain;
            $sellD->save();
            $cqty = $remainQty;
            continue;
        }
    }
        $sale = Sale::find($request->sell_id);
        return view('admin/sale/sellForm',compact('sale'));
    }



    public function printInvoice($id){
        $sale = Sale::find($id);
        return view('pdf_view',compact('sale'));
    }
  
    
    public function getQtyCount1($product_id){
         return Purchase::Where('product_id', $product_id)
        ->selectRaw("SUM(remaining_qty) as remaining_qty")
        ->selectRaw("product_id")
        ->groupBy('product_id')
        ->first()->remaining_qty ?? 0;
    }
    public function getQtyCount2($product_id){
        return Substock::Where('product_id', $product_id)
       ->selectRaw("SUM(remaining_qty) as remaining_qty")
       ->selectRaw("product_id")
       ->groupBy('product_id')
       ->first()->remaining_qty ?? 0;
   }
   public function getQtyCount3($product_id){
    return Onsale::Where('product_id', $product_id)
   ->selectRaw("SUM(remaining_qty) as remaining_qty")
   ->selectRaw("product_id")
   ->groupBy('product_id')
   ->first()->remaining_qty ?? 0;
}

    public function sell_detail($id){
        $sale = Sale::find($id);
        $isVisible = true;
        return view('admin/sale/sellForm',compact('sale','isVisible'));
    }
}