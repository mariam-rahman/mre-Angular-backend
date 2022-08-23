<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use App\Models\Salary;
use Livewire\Component;

class ShowComponent extends Component
{
    public $employee;
    public $salary;
    public $promote_id; 
    public $designation;
   public $eId;

    public function render() 
    {
        $this->employee = Employee::findOrFail($this->eId);
        return view('livewire.employee.show-component');
    }

       //Data validation
       protected $rules = [
        'salary' => 'required',
        'designation' => 'required'
    ];




    public function updated($property)
    {
        $this->validateOnly($property);
    }
    //End data validation
    
    public function mount($id){
        $this->eId = $id;
    }



    public function savePromote($id){

       $this->validate();
     $promote = Salary::create(['employee_id'=>$id,
                      'salary'=>$this->salary,
                      'designation'=>$this->designation]);
    if($promote)
    session()->flash('success', 'Employee successfully promoted!');
    else
    session()->flash('danger', 'Employee can not be promoted! ');
       $this->clear();
    }



    public function editPromote($id){
        $promote = Salary::findOrfail($id);
        $this->promote_id = $promote->id;
        $this->salary = $promote->salary;
        $this->designation = $promote->designation;
    }

    

    public function updatePromote(){
        $this->validate();
         $promoteEmp = Salary::findOrfail($this->promote_id);
         $promoteEmp->salary = $this->salary;
         $promoteEmp->designation = $this->designation;
        $promoteEmp->save();
        if($promoteEmp)
            session()->flash('success', 'Promotion Updated!');
        else
        session()->flash('danger', 'Promotion cannot be updated!');
        $this->clear();
    }

    public function clear(){
        $this->salary = null;
        $this->designation = null;
    }

}
