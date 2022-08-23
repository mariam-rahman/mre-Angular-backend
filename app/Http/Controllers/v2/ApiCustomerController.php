<?php

namespace App\Http\Controllers\v2;

use App\Models\Sale;
use App\Models\Payment;
use App\Models\Customer;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Claims\Custom;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Sale_detail;

class ApiCustomerController extends Controller
{
    function list(){
        return Customer::latest()->get();
    }

    function add(Request $request){
      $customer = new Customer();
      $customer->name = $request->name;
      $customer->email = $request->email;
      $customer->phone = $request->phone;
      $customer->address = $request->address;
      $customer->save();
        return response()->json(true);
    }

    function customerEdit($id){
        return Customer::find($id);
    }

    function updateCustomer(Request $request){
        $customer = Customer::find($request->id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->update();
        return response()->json(true);
        
    }

    function customerDetails($id){
        $sell_details = Sale::query()
        ->select('p.name as product_name', 's.created_at as date', 'd.sell_price as price', 'd.qty as qty')
        ->from('sales AS s')
        ->join('sale_details as d','s.id','=','d.sale_id')
        ->join('products as p','p.id','=','d.product_id')
        ->where('customer_id',$id)
        ->orderBy('s.id','desc')
        ->get();

        $customer_data = Payment::where('customer_id',$id)
        ->selectRaw("SUM(debt) as debt")
        ->selectRaw("SUM(paid) as paid")
        ->first();
        return array(
            'sell_deatils'=>$sell_details,
            'debt_paid'=>$customer_data
    );
    }

    function customerDebt($id)
    {
      $details = Payment::select('debt','paid','created_at','id', 'sale_id')
        ->where('customer_id',$id)
        ->get();
        $total = Payment::where('customer_id',$id)
        ->selectRaw("SUM(debt) as debt")
        ->selectRaw("SUM(paid) as paid")
        ->first();

    return array(
        "payments"=>$details,
        "total"=>$total
    );

    }

    function debtDetails($id){
        
        $products = Sale_detail::select('s.id','s.created_at','s.sell_price', 's.qty', 'p.name as product_name')
        ->from('sale_details as s')
        ->join('products as p', 's.product_id', '=', 'p.id')
        ->where('s.sale_id', $id)
        ->get();
        return $products;
    }

    function pay(Request $request){
        Log::info($request->all());
        $payments = Payment::where('customer_id',$request->customer_id)->get();
        $amount = $request->amount;
    foreach($payments as $model){
        
      if(($model->debt) > $amount)
       {
             $model->debt = ($model->debt)-($amount);
             $model->paid += ($amount);
             $model->update();
             break;
       }
    
       else {
        $remaining =($amount)-($model->debt);
        $model->debt = 0;
        $model->paid += ($model->debt);
        $model->update(); 
        $amount = $remaining;
        continue;
       }  
       
    }
    return response()->json(true);

    }
}
