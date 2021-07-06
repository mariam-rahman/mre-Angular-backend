<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Stock;
use App\Models\Substock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::Where('stock_id',1)
        ->selectRaw("SUM(qty) as qty")
        ->selectRaw("SUM(price) as price")
        ->selectRaw("SUM(remaining_qty) as remaining_qty")
        ->selectRaw("product_id")
        ->groupBy('product_id')
        ->get();
        return view('admin/stock/main_stock_items',compact('purchases'));
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
        Stock::create($request->all());
        return redirect(route('stock.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        
        return view('admin/stock/show',compact('stock'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        return view('admin/stock/edit',compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $stock->update($request->all());
        return redirect(route('stock.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();
    }

    public function moveTo(Request $request,$product_id){
        $countQty = Purchase::Where('stock_id',1)->where('product_id',$product_id)
        ->selectRaw("SUM(qty) as qty")
        ->selectRaw("SUM(price) as price")
        ->selectRaw("SUM(remaining_qty) as remaining_qty")
        ->selectRaw("product_id")
        ->groupBy('product_id')
        ->first()->remaining_qty;
    
    $qty = $request->move_qty;
    $cqty = $qty;
    if($qty>$countQty){
        return redirect(route('stock.moveForm',$product_id));
    }
    $purchases = Purchase::where('product_id',$product_id)->get();
foreach($purchases as $purchase)
 {
    $remainQty = $purchase->remaining_qty-$cqty;
     $cqty -= $remainQty;
    if($cqty<0 || $cqty == 0)
    {
        $purchase->remaining_qty = $remainQty;
        $purchase->update();
        break;
    } 
    $purchase->remaining_qty = $remainQty;
    $purchase->update();
 }

 $sub = new Substock();

 $sub->product_id = $product_id;
 $sub->qty = $qty;
 $sub->remaining_qty = $qty;
 $sub->stock_id = 2;
 $sub->price = 0;
 $sub->save();
 return redirect(route('stock.index'));
    }

    public function moveForm($product_id){

        return view('admin/stock/moveForm',compact('product_id'));
    }
}
