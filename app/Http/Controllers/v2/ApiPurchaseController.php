<?php

namespace App\Http\Controllers\v2;

use App\Models\Purchase;
use App\Models\Substock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Onsale;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ApiPurchaseController extends Controller
{


    function list(Request $request)
    {
        $query = Purchase::query();
        $purchases = null;
        $count = 0;

        $data = json_encode($request->data);
        $d = json_decode($data);
        $start = $d->start;
        $length = $d->length;
        $query->select('p.id', 'p.price', 'p.qty', 'p.remaining_qty', 'p.stock_id as stock', 'pro.name as product')
            ->from('purchases as p')
            ->join('products as pro', 'pro.id', '=', 'p.product_id')
            ->orderBy('id', 'desc')
            ->skip($start)
            ->take($length);

        if ($request->filters != null) {
            $filter = json_encode($request->filters);
            $f = json_decode($filter);
            $purchases = $query->where('pro.name', 'like', '%' . $f->product_name ?? '' . '%')
                ->get();
            $count = count($purchases);
        } else {
            $purchases = $query->get();
            $count = Purchase::count();
        }

        return array(
            'data' => $purchases,
            'count' => $count
        );
    }



    function create(Request $request)
    {
        log::info('here is the purchase',$request->all());
        $msg = '';
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'stock_id' => 'required'
        ]);
        
        if ($validator->fails()) {
            $msg = 'Please fill up all the required fields';
            return array('msg' => $msg,'response'=>false);
        }

        try {
            $purchase = new Purchase();
            $purchase->product_id = $request->product_id;
            $purchase->price = $request->price;
            $purchase->qty = $request->qty;
            $purchase->remaining_qty = $request->qty;
            $purchase->stock_id = $request->stock_id;
            $purchase->save();

            if ($purchase->id && $request->stock_id==2) {
                $subStock = new Substock();
                $subStock->product_id = $request->product_id;
                $subStock->qty = $request->qty;
                $subStock->remaining_qty = $request->qty;
                $subStock->stock_id = $request->stock_id;
                $subStock->purchase_id = $purchase->id;
                $subStock->save();
            }
          
        } catch (\Exception $e) {
            return array('msg' => $e->getMessage(),'response'=>false);
        }
        return array('response'=>true);
    }

    function edit($id)
    {
        return Purchase::find($id);
    }


    function update(Request $request, $id)
    {
        try {
            $purchase = Purchase::findOrFail($id);
            $purchase->product_id = $request->product_id;
            $purchase->price = $request->price;
            $purchase->qty = $request->qty;
            $purchase->remaining_qty = $request->qty;
            $purchase->stock_id = $request->stock_id;
            $purchase->update();

            if($purchase->stock_id==2)
            {
                $subStock = Substock::where('purchase_id',$purchase->id)->first();
                $subStock->product_id = $request->product_id;
                $subStock->qty = $request->qty;
                $subStock->remaining_qty = $request->qty;
                $subStock->update();
            }
        } catch (\Throwable $th) {
            Log::info("info:",[$th->getMessage()]);
            return response()->json(false);
        }

        return response()->json(true);
    }

    function delete($id)
    {
        try {
            $purchase = Purchase::findOrFail($id);
            $stock_id = $purchase->stock_id;
            if ($stock_id == 1)
                $purchase->delete();

            if ($stock_id == 2) {
                Substock::Where('purchase_id', $id)->delete();
                $purchase->delete();
            }
        } catch (\Throwable $th) {
            return response()->json(false);
        }
        return response()->json(true);
    }
}
