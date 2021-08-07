<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Onsale;
use App\Models\Customer;
use App\Models\Substock;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class SubstockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $substocks = Substock::selectRaw("SUM(qty) as qty")
        ->selectRaw("SUM(remaining_qty) as remaining_qty")
        ->selectRaw("product_id")
        ->groupBy('product_id')
        ->get();
        return view('admin/substock/index',compact('substocks'));
    }

   // Generate PDF
   public function createPDF() {
    // retreive all records from db
    $data = Substock::all();

    // share data to view
    view()->share('substocks',$data);
    $pdf = PDF::loadView('pdf_view', $data);

    // download PDF file with download method
    return $pdf->download('pdf_file.pdf');
  }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Substock  $substock
     * @return \Illuminate\Http\Response
     */
    public function show(Substock $substock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Substock  $substock
     * @return \Illuminate\Http\Response
     */
    public function edit(Substock $substock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Substock  $substock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Substock $substock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Substock  $substock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Substock $substock)
    {
        //
    }

   public function details($product_id){
    $substock = Substock::selectRaw("SUM(qty) as qty")
    ->selectRaw("SUM(remaining_qty) as remaining_qty")
    ->selectRaw("product_id")
    ->groupBy('product_id')
    ->where('product_id',$product_id)->first();
       $items = Substock::where('product_id',$product_id)->get();
       return view('admin/substock/item_details',compact('items','substock'));
   }
    public function moveItemForm($productId){
        return view('admin/substock/move_item',compact('productId'));
    }

    public function MoveToSell(Request $request, $product_id){
        $countQty = Substock::Where('product_id', $product_id)
        ->selectRaw("SUM(remaining_qty) as remaining_qty")
        ->selectRaw("product_id")
        ->groupBy('product_id')
        ->first()->remaining_qty;

    $qty = $request->move_qty;
    $cqty = $qty;
    if ($qty > $countQty) {
        return redirect(route('substock.index'));
    }

    $purchases = Substock::where('product_id', $product_id)->get();

    foreach ($purchases as $purchase) {
        $remain = $purchase->remaining_qty;
        if ($remain == 0 || $remain < 0) continue;

        $remainQty = $cqty-$remain;

        if($remainQty <= 0){

            $purchase->remaining_qty = -($remainQty);
            $purchase->update();

            $sub = new Onsale();
            $sub->product_id = $product_id;
            $sub->qty = $cqty;
            $sub->remaining_qty = $cqty;
            $sub->stock_id = 2;
            $sub->sell_price = $request->sell_price;
            $sub->discount = $request->discount;
            $sub->save();
            break;
        }

        if($remainQty > 0){
            $purchase->remaining_qty = 0;
            $purchase->update();

            $sub = new Onsale();
            $sub->product_id = $product_id;
            $sub->qty = $remain;
            $sub->remaining_qty = $remain;
            $sub->stock_id = 2;
            $sub->sell_price = $request->sell_price;
            $sub->discount = $request->discount;
            $sub->save();
            $cqty = $remainQty;
            continue;
        }
    }
     return redirect(route('substock.index'));
    }

    public function sellForm($product_id){
        $y = 1;

        $customers = Customer::all();
        return view('admin/sale/sellForm',compact('product_id','customers','y'));
    }

    public function sellStore(Request $request,$product_id){
        $countQty = Substock::Where('product_id', $product_id)
        ->selectRaw("SUM(remaining_qty) as remaining_qty")
        ->selectRaw("product_id")
        ->groupBy('product_id')
        ->first()->remaining_qty;

    $qty = $request->move_qty;
    $cqty = $qty;
    if ($qty > $countQty) {
        return redirect(route('onsale.index'));
    }

    $purchases = Substock::where('product_id', $product_id)->get();

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
            $sub->stock_id = 2;
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
            $sub->stock_id = 2;
            $sub->sold_price = $request->sold_price;
            $sub->customer_id = $request->customer_id;
            $sub->sold_date = $request->sold_date;
            $sub->save();
            $cqty = $remainQty;
            continue;
        }
    }
return redirect(route('substock.index'));
    }

}
