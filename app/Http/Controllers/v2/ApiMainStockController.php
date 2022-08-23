<?php

namespace App\Http\Controllers\v2;

use App\Models\Onsale;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Substock;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ApiMainStockController extends Controller
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

        $query->selectRaw("SUM(qty) as qty")
            ->selectRaw("SUM(price) as price")
            ->selectRaw("SUM(remaining_qty) as remaining_qty")
            ->selectRaw("product_id")
            ->selectRaw("p.name as product_name")
            ->join('products as p', 'p.id', '=', 'purchases.product_id')
            ->groupBy('p.name')
            ->groupBy('purchases.product_id')
            ->skip($start)
            ->take($length)
            ->where('stock_id', 1);
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

    function details($id)
    {
        $mainstock = Purchase::selectRaw("SUM(qty) as qty")
            ->selectRaw("SUM(remaining_qty) as remaining_qty")
            ->selectRaw("product_id")
            ->groupBy('product_id')
            ->where('product_id', $id)->first();

        $product = Product::select('p.name as product_name', 'c.title as category')
            ->from('products as p')
            ->join('categories as c', 'c.id', '=', 'p.category_id')
            ->where('p.id', $id)
            ->first();

        $items = Purchase::select('id', 'qty','price', 'created_at', 'stock_id')
        ->where('product_id','=',$id)
            ->orderBy('id', 'desc')
            ->get();
        return array(
            "main" => $mainstock,
            "items" => $items,
            'product' => $product
        );
    }


    public function moveToSubstock(Request $request)
    {
        log::info($request->all());
        $product_id = $request->product_id;

        $qty = $request->move_qty;
        $cqty = $qty;
        try {
            $purchases = Purchase::where('product_id', $product_id)->get();
            foreach ($purchases as $purchase) {
                $remain = $purchase->remaining_qty;
                if ($remain == 0 || $remain < 0) continue;

                $remainQty = $cqty - $remain;

                if ($remainQty <= 0) {

                    $purchase->remaining_qty = - ($remainQty);
                    $purchase->update();

                    $sub = new Substock();
                    $sub->product_id = $product_id;
                    $sub->purchase_id = $purchase->id;
                    $sub->qty = $cqty;
                    $sub->remaining_qty = $cqty;
                    $sub->stock_id = 1;
                    $sub->save();
                    break;
                } else {
                    $purchase->remaining_qty = 0;
                    $purchase->update();

                    $sub = new Substock();
                    $sub->purchase_id = $purchase->id;
                    $sub->product_id = $product_id;
                    $sub->qty = $remain;
                    $sub->remaining_qty = $remain;
                    $sub->stock_id = 1;
                    $sub->save();
                    $cqty = $remainQty;
                    continue;
                }
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

        return response()->json(true);
    }

    function moveOnSsale(Request $request){
        
        $qty = $request->move_qty;
        $productId = $request->product_id;
        $sell_price = $request->sell_price;
        $discount = $request->discount;
        $cqty = $qty;
        try {
            $purchases = Purchase::where('product_id', $productId)->get();

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
                    $sub->stock_id = 1;
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
                    $sub->stock_id = 1;
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
}
