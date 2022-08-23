<?php

namespace App\Http\Controllers\v2;

use App\Models\Onsale;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class OnSaleController extends Controller
{
    function list(Request $request)
    {
        $query = Onsale::query();
        $onsales = null;
        $count = 0;

        $data = json_encode($request->data);
        $d = json_decode($data);
        $start = $d->start;
        $length = $d->length;
        $query->selectRaw("SUM(qty) as qty")
            ->selectRaw("SUM(remaining_qty) as remaining_qty")
            ->selectRaw("product_id")
            ->selectRaw("p.name as product_name")
            ->join('products as p', 'p.id', '=', 'onsales.product_id')
            ->groupBy('p.name')
            ->groupBy('onsales.product_id')
            ->skip($start)
            ->take($length);
        if ($request->filters != null) {
            $filter = json_encode($request->filters);
            $f = json_decode($filter);
            $onsales = $query->where('p.name', 'like', '%' . $f->product_name ?? '' . '%')
                ->get();
                $count = $query->where('p.name', 'like', '%' . $f->product_name ?? '' . '%')->count();
        } else {
            $onsales = $query->get();
            $count = Onsale::count();
        }
        return array(
            'data' => $onsales,
            'totalRecords' => $count
        );
    }

    
    public function OnSaleDetails($productId)
    {
       

        $onsaleTotal = Onsale::selectRaw("SUM(qty) as qty")
            ->selectRaw("SUM(remaining_qty) as remaining_qty")
            ->selectRaw("product_id")
            ->groupBy('product_id')
            ->where('product_id', $productId)->first();

        $product = Product::select('p.name as product_name', 'c.title as category')
            ->from('products as p')
            ->join('categories as c', 'c.id', '=', 'p.category_id')
            ->where('p.id', $productId)
            ->first();
        
        $onsales = Onsale::select('id', 'qty', 'created_at', 'stock_id','sell_price','discount')
        ->where('product_id',$productId)
            ->orderBy('id', 'desc')
            ->get();
        return array(
            "totalOnsale" => $onsaleTotal,
            "onsaleDetails" => $onsales,
            'product' => $product
        );
    }
}
