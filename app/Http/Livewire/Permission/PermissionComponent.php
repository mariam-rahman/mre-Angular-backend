<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
use App\Models\Permission;
use Spatie\Permission\Middlewares\PermissionMiddleware;

class PermissionComponent extends Component
{

    public $name;
    public $permissions;
    public $permission_id;
    public $updateMode = false;


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
        if(Permission::create(['name'=>$this->name]))
        session()->flash('success', 'Permission has been created successfully!');
        else
        session()->flash('error', 'Permission cannot be deleted!');
        $this->name = null;
    }

    public function edit($permissions_id){
    
        $this->permission_id = $permissions_id;
        $eidtPerm = Permission::findOrfail($permissions_id);
        $this->name = $eidtPerm->name;
        $this->updateMode = true;
    }

    public function update(){
        $permission = Permission::findOrfail($this->permission_id);
        $permission->name = $this->name;
        if($permission->update())
        session()->flash('info', 'Permission successfully updated!');
        else
        session()->flash('error', 'Permission cannot be updated!');
        $this->updateMode = false;
    }

    public function delete($Permission_id){
        $permission = Permission::findOrfail($Permission_id);
        if(count($permission->users)>0){
            session()->flash('error', 'You cannot delete this Permission, it has been used for user/users!');
        }
        else{
            $permission->delete();
            session()->flash('success', 'Permission has been deleted successfully!');

        }
       
    }


}
