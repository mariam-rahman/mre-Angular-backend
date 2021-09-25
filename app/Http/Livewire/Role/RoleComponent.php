<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;

class RoleComponent extends Component
{

    public $name;


    public function render()
    {
        return view('livewire.role.role-component');
    }

    
    protected $rules = [
        'name' => 'required'
       
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function save(){
        $this->validate();
        
    }
}
