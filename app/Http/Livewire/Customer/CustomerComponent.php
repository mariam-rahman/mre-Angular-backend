<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

use App\Models\Customer;

class CustomerComponent extends Component
{

    public $name;
    public $email;
    public $phone;
    public $address;
    public $customers;
    public $record_id;
    public $updateMode=false;
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
     $customerss = Customer::create($validateCustomer);
     
     if ($customerss)
     session()->flash('success', 'Category successfully created!');
 else
     session()->flash('error', 'Category cannot be deleted!');
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

    public function resetField()
    {
      $this->name = null;
      $this->email = null;
      $this->phone = null;
      $this->address = null;
      $this->updateMode = false;
    }


    
}
