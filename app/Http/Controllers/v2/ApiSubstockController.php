<?php

namespace App\Http\Controllers\v2;

use App\Models\Onsale;
use App\Models\Product;
use App\Models\Substock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ApiSubstockController extends Controller
{


    public function list(Request $request)
    {
        $query = Substock::query();
        $purchases = null;
        $count = 0;

        $data = json_encode($request->data);
        $d = json_decode($data);
        $start = $d->start;
        $length = $d->length;


        $query->selectRaw("SUM(qty) as qty")
            ->selectRaw("SUM(remaining_qty) as remaining_qty")
            ->selectRaw("s.product_id")
            ->selectRaw('p.name as product_name')
            ->groupBy('s.product_id')
            ->groupBy('p.name')
            ->from('substocks as s')
            ->join('products as p', 's.product_id', '=', 'p.id')
            ->orderBy('s.id', 'desc')
            ->skip($start)
            ->take($length);
        if ($request->filters != null) {
            $filter = json_encode($request->filters);
            $f = json_decode($filter);
            $purchases = $query->where('p.name', 'like', '%' . $f->product_name ?? '' . '%')
            
                ->get();
        } else {
            $purchases = $query->get();
        }
        $count = count($purchases);
        return array(
            'data' => $purchases,
            'totalRecords' => $count
        );
    }


    public function details($productId) 
    {

        $substock = Substock::selectRaw("SUM(qty) as qty")
            ->selectRaw("SUM(remaining_qty) as remaining_qty")
            ->selectRaw("product_id")
            ->groupBy('product_id')
            ->where('product_id', $productId)->first();

        $product = Product::select('p.name as product_name', 'c.title as category')
            ->from('products as p')
            ->join('categories as c', 'c.id', '=', 'p.category_id')
            ->where('p.id', $productId)
            ->first();

        $items = Substock::select('id', 'qty', 'created_at', 'stock_id')
        ->where('product_id','=',$productId)
            ->orderBy('id', 'desc')
            ->get();
        return array(
            "sub" => $substock,
            "items" => $items,
            'product' => $product
        );
    }



    function moveOnSale(Request $request)
    {
      log::info($request->all());
        $qty = $request->move_qty;
        $productId = $request->product_id;
        $sell_price = $request->sell_price;
        $discount = $request->discount;
        $cqty = $qty;
        try {
            $purchases = Substock::where('product_id', $productId)->get();

            foreach ($purchases as $purchase) {
                $remain = $purchase->remaining_qty;
                if ($remain == 0 || $remain < 0) continue;

                $remainQty = $cqty - $remain;

                if ($remainQty <= 0) {

                    $purchase->remaining_qty = - ($remainQty);
                    $purchase->update();

                    $sub = new Onsale();
                    $sub->product_id = $productId;
                    $sub->qty = $cqty;
                    $sub->remaining_qty = $cqty;
                    $sub->stock_id = 2;
                    $sub->sell_price = $sell_price;
                    $sub->discount = $discount;
                    $sub->save();
                    break;
                }


                if ($remainQty > 0) {
                    $purchase->remaining_qty = 0;
                    $purchase->update();

                    $sub = new Onsale();
                    $sub->product_id = $productId;
                    $sub->qty = $remain;
                    $sub->remaining_qty = $remain;
                    $sub->stock_id = 2;
                    $sub->sell_price = $sell_price;
                    $sub->discount = $discount;
                    $sub->save();
                    $cqty = $remainQty;
                    continue;
                }
            }
        } catch (\Exception $th) {
            return response()->json(false);
        }

        return response()->json(true);
    }


    function restoreData(Request $request){

    }
}
