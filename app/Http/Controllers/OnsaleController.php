<?php

namespace App\Http\Controllers;

use App\Models\Onsale;
use App\Models\Product;
use App\Models\Stock;
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
        $products = Product::all();
        $stocks = Stock::all();
        $onsales = Onsale::all();
       
        return view('admin/onsale/index', compact('products', 'stocks', 'onsales'));
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

        function onsale($onsale)
        {
            $actual_price = $onsale->sale_price;
            $qty = $onsale->qty;
            if ($qty > 1) {
                $percentage = (($actual_price * 10) / 100) * $qty;
               return $percentage;
            } else {

                $percentage = ($actual_price * 10) / 100;
                return $percentage;
            }
        }
       $revenue = onsale($onsale);
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
}
