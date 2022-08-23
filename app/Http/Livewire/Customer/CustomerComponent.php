<?php

namespace App\Http\Livewire\Customer;

use App\Models\Sale;

use App\Models\Payment;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Sale_detail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CustomerComponent extends Component
{
    use AuthorizesRequests;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $customers;
    public $record_id;
    public $updateMode=false;
    public $isVisible = 0;
    public $customer_details;
    public $sell_details;
    public $detail_of_sales;
    public $customer_data;
    public $debts;
    public $customer_id;
    public $amount; 

    public function render() //it acts as index function
    {
        $this->customers = Customer::latest()->get();
        return view('livewire.customer.customer-component');
    }

    protected $rules = [
        'name' => 'required',
        'email'=> 'required|email|nullable',
        'phone'=> 'required',
        'address'=> 'required'
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function save(){
      $validateCustomer = $this->validate();
     $customers = Customer::create($validateCustomer);
     
     if ($customers)
     session()->flash('success', 'Customer successfully created!');
 else
     session()->flash('error', 'Customer cannot be deleted!');
 $this->resetField();
}
   

    public function delete($id)
    {
        if (Customer::destroy($id))
            session()->flash('success', 'Category successfully deleted!');
        else
            session()->flash('error', 'Category cannot be deleted!');
    }

    public function edit($id){
      $customers = Customer::findOrFail($id);
      $this->record_id = $customers->id;
      $this->name = $customers->name;
      $this->email = $customers->email;
      $this->phone = $customers->phone;
      $this->address = $customers->address;
      $this->updateMode = true;
    }

    public function update(){
       $validateCustomer = $this->validate();
      $customers = Customer::findOrFail($this->record_id);
      $customers->update($validateCustomer);
      
      if ($customers->update($validateCustomer))
      session()->flash('info', 'Category successfully updated!');
      else
      session()->flash('error', 'Category cannot be deleted!');
      $this->resetField();
    }



    public function details($customer_id){
        $this->isVisible = 1;

      $this->sell_details = Sale::query()
      ->select('p.name as name', 's.created_at as date', 'd.sell_price as price', 'd.qty as qty')
      ->from('sales AS s')
      ->join('sale_details as d','s.id','=','d.sale_id')
      ->join('products as p','p.id','=','d.product_id')
      ->where('customer_id',$customer_id)->get();
     $this->customer_data = Payment::where('customer_id',$customer_id)
     ->selectRaw("SUM(debt) as debt")
     ->selectRaw("SUM(paid) as paid")
     ->first();

    }

    public function debt($customer_id){
            $this->customer_id = $customer_id;
            $this->debts = Payment::where('customer_id',$customer_id)
            ->where('debt','>',0) 
            ->get();
            $this->customer_data = Payment::where('customer_id',$customer_id)
            ->selectRaw("SUM(debt) as debt")
            ->selectRaw("SUM(paid) as paid")
            ->first();
            $this->name = Customer::Where('id',$customer_id)->first();
        
      $this->isVisible = 2;
    }

    public function goBack(){
        $this->isVisible = 0;
    }

    public function resetField()
    {
      $this->name = null;
      $this->email = null;
      $this->phone = null;
      $this->address = null;
      $this->updateMode = false;
    }

    public function debtDetails($sale_id){

       $this->sell_details = Sale_detail::Where('sale_id',$sale_id)->get();
       $this->isVisible = 4;
    }

    public function gobackdebt(){
        $this->customer_data = Payment::where('customer_id',$this->customer_id)
        ->selectRaw("SUM(debt) as debt")
        ->selectRaw("SUM(paid) as paid")
        ->first();
        $this->isVisible = 2;
    }

   

    public function deptPay($customerId){
        $this->customer_id = $customerId;
        $this->isVisible = 3;
    }

    public function saveDept(){
       
        $payments = Payment::where('customer_id',$this->customer_id)->get();
        foreach($payments as $model){
            
          if(($model->debt) > $this->amount)
           {
                 $model->debt = ($model->debt)-($this->amount);
                 $model->paid += ($this->amount);
                 $model->update();
                 break;
           }
           else {
            $remaining =($this->amount)-($model->debt);
            $model->debt = 0;
            $model->paid += ($model->debt);
            $model->update();
            $this->amount = $remaining;
            continue;
           }
        }
        $this->isVisible = 2;
    }
}
