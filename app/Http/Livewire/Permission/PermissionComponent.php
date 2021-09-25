<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
use App\Models\Permission;
use Spatie\Permission\Middlewares\PermissionMiddleware;

class PermissionComponent extends Component
{

    public $name;
    public $permissions;
    public function render()
    {
        $this->permissions = Permission::all();
        return view('livewire.permission.permission-component');
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
        Permission::create(['name'=>$this->name]);
        $this->name = null;
    }
}
