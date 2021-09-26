<?php

namespace App\Http\Livewire\Employee;

use session;
use App\Models\Slip;
use App\Models\Salary;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class EmployeeComponent extends Component
{
    use WithFileUploads;
    public $salaries;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $designation;
    public $image;
    public $salary;
    public $joining_date;
    public $record_id;
    public $updateMode = false;
    public $isVisible = true;
    public $employee;
    public $employees;
    public $emp_id;
    public $pdate;
    public $empSlip;
    public $empPay;
    public $payment;
    public $pay;
    public function render()
    {
       // $this->pay = Slip::latest()->get();
        $this->employees = Employee::latest()->get();
       // $this->salaries = Salary::latest()->get();
        return view('livewire.employee.employee-component');
    }

    //Data validation
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
        'designation' => 'required',
        'salary' => 'required|integer',
        'joining_date' => 'required',
        'image' => 'image|max:1024|nullable'
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }
    //End data validation



    public function save()
    {
        $this->validate();
        if ($this->image != null) {
            $image = $this->image->store('images/employee', 'public');

            $employee = Employee::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'joining_date' => $this->joining_date,
                'image' => $image
            ]);

            Salary::create([
                'employee_id' => $employee->id,
                'salary' => $this->salary,
                'designation' => $this->designation
            ]);
        } else {

            $employee = Employee::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'joining_date' => $this->joining_date
            ]);

            Salary::create([
                'employee_id' => $employee->id,
                'salary' => $this->salary,
                'designation' => $this->designation
            ]);
        }

        if ($employee)
            session()->flash('success', 'Employee successfully created!');
        else
            session()->flash('error', 'Employee cannot be created!');
        $this->resetInputFields();
    }


    //Delete Emplyee
    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        $oldiamge = "storage/" . $employee->image;

        if ($employee->delete()) {
            if (File::exists($oldiamge)) {
                File::delete($oldiamge);
            }
            session()->flash('success', 'Employee successfully Deleted!');
        } else {
            session()->flash('error', 'Employee cannot be Deleted!');
        }
    }


    //Edit Employee
    public function edit($id)
    {

        $employee = Employee::findOrFail($id);

        $this->record_id = $employee->id;
        $this->name = $employee->name;
        $this->email = $employee->email;
        $this->phone = $employee->phone;
        $this->address = $employee->address;
        $this->joining_date = $employee->joining_date;
        $this->updateMode = true;
    }


    //Update record
    public function update()
    {
        $this->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'address' => 'required',
                'joining_date' => 'required',
                'image' => 'image|max:1024|nullable'
            ]
        );

        $employee = Employee::findOrFail($this->record_id);

        if ($this->image != null) {
            $image = $this->image->store('images/employee', 'public');
            $oldimage = "storage/" . $employee->image;
            if (File::exists($oldimage)) {
                File::delete($oldimage);
            }
            $employee->name = $this->name;
            $employee->email = $this->email;
            $employee->phone = $this->phone;
            $employee->address = $this->address;
            $employee->joining_date = $this->joining_date;
            $employee->image = $this->image;
        } else {
            $employee->name = $this->name;
            $employee->email = $this->email;
            $employee->phone = $this->phone;
            $employee->address = $this->address;
            $employee->joining_date = $this->joining_date;
        }

        if ($employee->update())
            session()->flash('info', 'Category successfully updated!');
        else
            session()->flash('error', 'Category cannot be updated!');

            $this->resetInputFields();
    }



    //Clean input fields
     function resetInputFields()
    {
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->address = null;
        $this->salary = null;
        $this->designation = null;
        $this->joining_date = null;
        $this->image = null;
      
    }
    //End


    public function payslip($id)
    {
        $this->isVisible = false;
        $this->employee = Employee::findOrFail($id);
    }

    public function createPayment($id)
    {
         $this->validate([
            'payment' => 'required',
            'pdate' => 'required'
        ]);  

      $pay = Slip::create(['employee_id'=>$id,
                     'payment'=>$this->payment,
                     'payment_date'=>$this->pdate]);
        
     $pay->save();

     $this->employee = Employee::find($id);
     $this->payclear();
     if($pay)
      session()->flash('success', 'Payment stored');
      else
      session()->flash('error', 'Payment cannot be stored');
    
       
    }

    public function payclear(){
        $this->payment = null;
        $this->pdate = null;

    }

    public function goBack(){
        $this->isVisible = true;
    }
}
