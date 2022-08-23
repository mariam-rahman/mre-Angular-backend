<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DownloadController extends Controller
{
    function sale(Request $request)
    {
        $data = json_encode($request->data);
        $d = json_decode($data);
        $query = Sale::query();
        if ($request->filters) {
            $filters = json_encode($request->filters);
            $f = json_decode($filters);
            $sales = $query->whereBetween('created_at', [$f->date1, $f->date2])->get();
        } else {
            $sales = $query->get();
        }

        $customerName = null;
        $sells = array();
        foreach ($sales as $sale) {
            $sell_price = 0;

            if ($sale->customer)
                $customerName = $sale->customer->name;
            else
                $customerName = "Counter";
            foreach ($sale->sell_details as $d) {
                $sell_price +=  $d->sell_price * $d->qty;
            }

            $temp = [
                "customer_id" => $sale->customer_id,
                "sale_id" => $sale->id,
                "stock_id" => $sale->stock_id,
                "date" => $sale->created_at,
                'customer_name' => $customerName,
                'sell_price' => $sell_price
            ];

            array_push($sells, $temp);
        }

        return $sells;
    }

    function product(Request $request)
    {
        $filter = json_encode($request->filters);
        $f = json_decode($filter);
        $data = json_encode($request->data);
        $d = json_decode($data);
        $query = Product::query();
        $query->select('p.id', 'p.name', 'p.active', 'p.desc', 'c.title as category')
            ->from('products as p')
            ->join('categories as c', 'c.id', '=', 'p.category_id')
            ->orderBy('id', 'desc');

        if ($f) {
            $query->where('name', '=', $f->product_name);
            $products = $query->get();
        } else {
            $products = $query->get();
        }
        return $products;
    }
}
