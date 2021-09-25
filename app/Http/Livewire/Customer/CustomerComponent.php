<?php

namespace App\Http\Livewire\Customer;

use App\Models\Sale;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Payment;
use GuzzleHttp\Psr7\Query;
use App\Models\Sale_detail;
use Illuminate\Support\Facades\DB;

class CustomerComponent extends Component
{

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
      ->select('p.name as name', 's.sell_date as date', 'd.sell_price as price', 'd.qty as qty')
      ->from('sales AS s')
      ->join('sale_details as d','s.id','=','d.sale_id')
      ->join('products as p','p.id','=','d.product_id')
      ->where('customer_id',$customer_id)->get();
     $this->customer_data = Payment::where('customer_id',$customer_id)
     ->selectRaw("SUM(debt) as debt")
     ->selectRaw("SUM(paid) as paid")
     ->first();

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


    
}
