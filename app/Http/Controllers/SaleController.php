<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Onsale;
use App\Models\Customer;
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
        //
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


}
