<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Onsale;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
         $products = Product::all();
        $stocks = Stock::all();
        $purchases = Purchase::all();

        return view('admin/purchase/index',compact('stocks','products','purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchase = new Purchase();
        $purchase->qty = $request->qty;
        $purchase->remaining_qty = $request->qty;
         $purchase->stock_id = $request->stock_id;
         $purchase->product_id = $request->product_id;
         $purchase->price = $request->price;
         $purchase->save();
       return redirect(route('purchase.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        
        $stocks = Stock::all();
        $products = Product::all();
        return view('admin/purchase/edit',compact('purchase','stocks','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        $purchase->update($request->all());

      return redirect(route('purchase.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return redirect(route('purchase.index'));
    }


public function showOnSaleForm($purchaseId){
    return view('admin/purchase/moveToOnSale',compact('purchaseId')); 
}



    public function moveToOnSale(Request $request, $purchaseId){
        $purchase = Purchase::find($purchaseId);
        $remainingQty=$purchase->remaining_qty;
        if($remainingQty > ($request->qty))
        {
            $purchase->remaining_qty = ($remainingQty)-($request->qty);
           $purchase->update();
            $onSale = new Onsale();
            $onSale->qty = $request->qty;
            $onSale->sale_price = $request->price;
            $onSale->purchase_id = $purchaseId;
            $onSale->save();

            
            return redirect(route('onsale.index'));
        }
        else {
           return "No sufficient balance";
        }
    }
}
