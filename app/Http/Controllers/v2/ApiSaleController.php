<?php

namespace App\Http\Controllers\v2;

use App\Classes\EmailNotification;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Onsale;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Sale_detail;
use App\Models\Substock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ApiSaleController extends Controller
{
    //operation os sale
    function list(Request $request)
    {
        $data = json_encode($request->data);
        $d = json_decode($data);
        $start = $d->start;
        $length = $d->length;
        $totalRecords = 0;

        $query = Sale::query();

        if ($request->filters) {
            $filters = json_encode($request->filters);
            $f = json_decode($filters);
            $sales = $query->whereBetween('created_at', [$f->date1, $f->date2])
                ->take($length)
                ->skip($start)
                ->get();
            $totalRecords = Sale::whereBetween('created_at', [$f->date1, $f->date2])->count();
        } else {
            $sales = $query->take($length)
                ->skip($start)
                ->get();
            $totalRecords = Sale::count();
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

        return array("sells" => $sells, "totalRecords" => $totalRecords);
    }

    

    function deleteSale($sale_id)
    {
        $sell = Sale::findOrFail($sale_id);
        $sell->sell_details()->delete();
        if ($sell->delete()) return true;
        else false;
    }

    function saleDetailsList($id)
    {
        // $product_names = [];
        // $saleDetails = Sale_detail::where('sale_id', $id)->get();
        // foreach ($saleDetails as $d) {
        //     $product_names = $d->product->name;
        // }

        // return array(
        //     'saleDetails' => $saleDetails,
        //     'product_name' => $product_names,
        // );

        return Sale_detail::select('p.name','s.qty','s.sell_price','s.stock_id')
        ->from('products as p')
        ->join('sale_details as s', 'p.id','product_id')
        ->where('s.sale_id',$id)
        ->get();
        
    }

    //end

    function customerList()
    {
        return Customer::select('id', 'name')->get();
    }

    function add(Request $request)
    {
        $sell = new Sale();
        $sell->customer_id = $request->customer_id;
        $sell->date = $request->date;
        $sell->save();
        return array(
            'sell_id' => $sell->id,
            'isTrue' => true
        );
    }

    function getProduct($stockId)
    {
        Log::info($stockId);
        if ($stockId == 1)
            $products = Purchase::select('p.name', 'p.id')
                ->from('purchases as pu')
                ->join('products as p', 'p.id', '=', 'pu.product_id')
                ->where('pu.remaining_qty', '>', 0)
                ->where('pu.stock_id','=', 1)
                ->groupBy('p.id','p.name')
                ->get();
        if ($stockId == 2)
            $products = Substock::select('p.name', 'p.id')
                ->from('substocks as pu')
                ->join('products as p', 'p.id', '=', 'pu.product_id')
                ->where('remaining_qty', '>', 0)
                ->groupBy('p.id','p.name')
                ->get();
        if ($stockId == 3)
            $products = Onsale::select('p.name', 'p.id')
                ->from('onsales as pu')
                ->join('products as p', 'p.id', '=', 'pu.product_id')
                ->where('remaining_qty', '>', 0)
                ->groupBy('p.id','p.name')
                ->get();
     return $products;
    }

    function saleList($sale_id)
    {
     
        return Sale_detail::select('s.sell_price', 's.qty', 's.id', 'p.name as productName', 's.product_id')
            ->from("sale_details as s")
            ->join('products as p', 'p.id', '=', 's.product_id')
            ->where('sale_id', $sale_id)
            ->get();
    }

    function createSellProduct(Request $req)
    {
   
        $stock_id =  $req->stockId;
        $product_id = $req->product_id;
        $qty = $req->qty;
        $cqty = $qty;
        $purchases = null;
        $countQty = 0;
        if ($stock_id == 3) {
            $countQty = $this->getQtyCount3($product_id);
            if ($countQty >= $qty)
            {
                $purchases = Onsale::where('product_id', $product_id)
                    ->where('remaining_qty', '>', 0)
                    ->get();
            }

            else
                return;
        }
        if ($stock_id == 2) {
            $countQty = $this->getQtyCount2($product_id);
            if ($countQty >= $qty)
                $purchases = Substock::where('product_id', $product_id)
                    ->where('remaining_qty', '>', 0)
                    ->get();
            else
                return;
        }
        if ($stock_id == 1) {
            $countQty = $this->getQtyCount1($product_id);
            if ($countQty >= $qty)
                $purchases = Purchase::where('product_id', $product_id)
                    ->where('remaining_qty', '>', 0)
                    ->where('stock_id', 1)
                    ->get();
            else
                return;
        }
        try {

            foreach ($purchases as $purchase) {

                $remain = $purchase->remaining_qty;

                if ($remain == 0) continue;
                $remainQty = $cqty - $remain;
                if ($remainQty <= 0) {
                    if ($remainQty == 0)
                        $purchase->remaining_qty = 0;
                    else
                        $purchase->remaining_qty = - ($remainQty);
                    $purchase->update();
                    $sell = new Sale_detail();
                    $sell->product_id = $req->product_id;
                    $sell->sell_price = $req->sell_price;
                    $sell->stock_id = $req->stockId;
                    $sell->qty = $req->qty;
                    $sell->sale_id = $req->saleId;
                    $sell->save();
                    break;
                } else {
                    $purchase->remaining_qty = 0;
                    $purchase->update();
                    $cqty = $remainQty;
                }
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        return response()->json(true);
    }

    function addPayment(Request $request)
    {
        $payment = new Payment();
        $payment->sale_id = $request->sell_id;
        $payment->customer_id = $request->customerId;
        $payment->debt = $request->debt;
        $payment->paid = $request->payment;
        $payment->save();
        return array(
            "isTrue" => true,
            "paymentId" => $payment->id
        );
    }

    function deleteSoldProduct(Request $req)
    {

        if ($req->stockId == 1) {
            $purchase = Purchase::where('product_id', $req->product_id)->first();
            $purchase->remaining_qty += $req->qty;
            $purchase->update();
            if ($purchase) {
                Sale_detail::destroy($req->id);
                return true;
            }
        }
        if ($req->stockId == 2) {
            $purchase = Substock::where('product_id', $req->product_id)->first();
            $purchase->remaining_qty += $req->qty;
            $purchase->update();
            if ($purchase) {
                Sale_detail::destroy($req->id);
                return true;
            }
        }
        if ($req->stockId == 3) {
            $purchase = Onsale::where('product_id', $req->product_id)->first();
            $purchase->remaining_qty += $req->qty;
            $purchase->update();
            if ($purchase) {
                Sale_detail::destroy($req->id);
                return true;
            }
        }
        return false;
    }

    function editSoldProduct(Request $req)
    {
    }

    function updateSellProduct(Request $request)
    {
        $updateSell = Sale_detail::findOrFail($request->sellDetailsId);
        $updateSell->sell_price = $request->sell_price;
        $updateSell->qty = $request->qty;
        $updateSell->product_id = $request->productId;
        $updateSell->sale_id = $request->sellId;
        $updateSell->update();
        return response()->json(true);
    }


    function printInvoice($paymentId)
    {
        $payment =  Payment::select('p.id', 'p.debt', 'p.paid', 'p.created_at', 'p.sale_id', 'c.name as cname')
            ->from('payments as p')
            ->join('customers as c', 'p.customer_id', '=', 'c.id')
            ->where('p.id', $paymentId)
            ->first();

        $products = Sale_detail::select('s.sell_price', 's.qty', 'p.name as product_name')
            ->from('sale_details as s')
            ->join('products as p', 's.product_id', '=', 'p.id')
            ->where('s.sale_id', $payment->sale_id)
            ->get();

                $mail = new EmailNotification();
                $mail->sendInvoiceEmail($products, $payment); 
        
        return array(
            'payment' => $payment,
            'products' => $products
        );


    }





    public function getQtyCount1($product_id)
    {
        return Purchase::Where('product_id', $product_id)
            ->selectRaw("SUM(remaining_qty) as remaining_qty")
            ->selectRaw("product_id")
            ->groupBy('product_id')
            ->first()->remaining_qty ?? 0;
    }
    public function getQtyCount2($product_id)
    {
        return Substock::Where('product_id', $product_id)
            ->selectRaw("SUM(remaining_qty) as remaining_qty")
            ->selectRaw("product_id")
            ->groupBy('product_id')
            ->first()->remaining_qty ?? 0;
    }
    public function getQtyCount3($product_id)
    {
        return Onsale::Where('product_id', $product_id)
            ->selectRaw("SUM(remaining_qty) as remaining_qty")
            ->selectRaw("product_id")
            ->groupBy('product_id')
            ->first()->remaining_qty ?? 0;
    }
}
