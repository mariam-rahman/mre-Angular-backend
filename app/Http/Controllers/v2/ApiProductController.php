<?php

namespace App\Http\Controllers\v2;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ApiProductController extends Controller
{
    function list(Request $request)
    {
        $filter = json_encode($request->filters);
        $count = 0;
        $f = json_decode($filter);

        $data = json_encode($request->data);
        $d = json_decode($data);
        $start = $d->start;
        $length = $d->length;
        DB::statement("SET SQL_MODE=''");
        $query = Product::select('products.id', 'products.name', 'products.desc', 'categories.title as category', DB::raw('SUM(purchases.remaining_qty) As remainingQty'), DB::raw('SUM(purchases.remaining_qty) As Qty'))
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('purchases', 'purchases.product_id', '=', 'products.id')
            ->groupBy('Purchases.product_id')

            ->skip($start)
            ->take($length);
        if ($f) {
            if (!empty($f->dir))
                $query->orderBy($f->prop, $f->dir);
            else
                $query->where('name', '=', $f->product_name);
            $products = $query->get();
            $count = count($products);
        } else {
            $products = $query->get();
            $count = Product::count();
        }


        return array(
            "data" => $products,
            "count" => $count
        );
    }




    function add(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->category_id = $request->category;
        $product->save();
        return response()->json(true);
    }

    function show($id)
    {
        $product = Product::select('p.name', 'p.desc', 'p.image', 'p.active', 'c.title as category')
            ->from('products as p')
            ->join('categories as c', 'p.category_id', '=', 'c.id')->first();
        return $product;
    }

    function edit($id)
    {
        return Product::find($id);
    }

    function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->category_id = $request->cat_id;
        $product->update();
        return response()->json(true);
    }

    function delete($id)
    {
        $product = Product::find($id)->delete();
        return response()->json(true);
    }
    //this data will called by purchase

    function productList()
    {
        return Product::select('id', 'name')->get();
    }
}
