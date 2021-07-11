<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Substock;
use Illuminate\Http\Request;

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


    public function moveItemForm(){
        return view('admin/substock/move_item');
    }
}
