<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Stock;
use App\Models\Onsale;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Substock;
use Illuminate\Http\Request;

class OnsaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $onsales = Onsale::selectRaw("SUM(qty) as qty")
        ->selectRaw("SUM(remaining_qty) as remaining_qty")
        ->selectRaw("product_id")
        ->groupBy('product_id')
        ->get();
        return view('admin/onsale/index',compact('onsales'));

        // $onsale = Onsale::all();
       
        // return view('admin/onsale/index', compact('onsale'));
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
        $onsale = Onsale::create($request->all());

        return redirect(route('onsale.index'));
        //return redirect(route('onsale.index',$revenue));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Onsale  $onsale
     * @return \Illuminate\Http\Response
     */
    public function show(Onsale $onsale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Onsale  $onsale
     * @return \Illuminate\Http\Response
     */
    public function edit(Onsale $onsale)
    {
        $products = Product::all();
        $stocks = Stock::all();
        return view('admin/onsale/edit',compact('onsale','products','stocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Onsale  $onsale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Onsale $onsale)
    {
        $onsale->update($request->all());
        return redirect(route('onsale.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Onsale  $onsale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Onsale $onsale)
    {
        $onsale->delete();
        return redirect(route('onsale.index'));
    }

    public function sellForm($product_id){
        $customers = Customer::all();
        return view('admin/sale/sellForm',compact('product_id','customers'));

    }

    public function sellStore(Request $request,$product_id){
        $countQty = Onsale::Where('product_id', $product_id)
        ->selectRaw("SUM(remaining_qty) as remaining_qty")
        ->selectRaw("product_id")
        ->groupBy('product_id')
        ->first()->remaining_qty;

    $qty = $request->move_qty;
    $cqty = $qty;
    if ($qty > $countQty) {
        return redirect(route('onsale.index'));
    }

    $purchases = Onsale::where('product_id', $product_id)->get();

    foreach ($purchases as $purchase) {
        $remain = $purchase->remaining_qty;
        if ($remain == 0 || $remain < 0) continue;

        $remainQty = $cqty-$remain;

        if($remainQty <= 0){

            $purchase->remaining_qty = -($remainQty);
            $purchase->update();

            $sub = new Sale();
            $sub->product_id = $product_id;
            $sub->qty = $cqty;
            $sub->stock_id = 3;
            $sub->sold_price = $request->sold_price;
            $sub->customer_id = $request->customer_id;
            $sub->sold_date = $request->sold_date;
            $sub->save();
            break;
        }

        if($remainQty > 0){
            $purchase->remaining_qty = 0;
            $purchase->update();

            $sub = new Sale();
            $sub->product_id = $product_id;
            $sub->qty = $remain;
            $sub->stock_id = 3;
            $sub->sold_price = $request->sold_price;
            $sub->customer_id = $request->customer_id;
            $sub->sold_date = $request->sold_date;
            $sub->save();
            $cqty = $remainQty;
            continue;
        }
    }
       return redirect(route('onsale.index'));
    }


    public function details($product_id){
        
            $onsaleInfo = Onsale::selectRaw("SUM(qty) as qty")
            ->selectRaw("SUM(remaining_qty) as remaining_qty")
            ->selectRaw("product_id")
            ->groupBy("product_id")
            ->where("product_id",$product_id)->first();
        $onsales = Onsale::where('product_id',$product_id)->get();

         return view('admin/onsale/item_detail',compact('onsales','onsaleInfo'));
    }
}
