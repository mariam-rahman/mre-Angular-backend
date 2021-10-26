<?php

namespace App\Http\Livewire\Userm;

use App\Models\User;
use Livewire\Component;
use App\Classes\MREPolicy;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserManagementComponent extends Component
{
    public $name;
     public $users = [];
     public $permissions=null;
     public $password;
    public $password_confirmation;
    public $email;
    public $updateMode = false;
    public $user_id;
    public $perms = [];
    public $userPerms = [];
    private $policy;
    function __construct()
    {
        $this->policy = new MREPolicy();
        
    }
    public function render()
    {
      
        $this->users = User::latest()->get();
        return view('livewire.userm.user-management-component');
    }

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:4',
        'password_confirmation'=>'required|same:password',
        'perms'=>'required'
        
    ];
    public function updated($property)
    {
        $this->validateOnly($property);
    }
    public function save(){
        $this->validate();
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->save();
        $user->permissions()->sync($this->perms);
        $this->resetData();
    }

    public function delete($id){
        $user = User::findOrfail($id);
      if($user->delete())
      session()->flash('success', 'User successfully deleted!');
      else 
      session()->flash('error', 'User cannot be created!');
    }

    public function edit($user_id){
   
        $this->user_id = $user_id;
        $user = User::findOrfail($user_id);
         $this->name = $user->name;
         $this->email = $user->email;
        $this->updateMode = true;
        $this->perms = $user->permissions->pluck('id');
       
        // for($i=0; $i<count($perms); $i++)
        // $this->userPerms[$i] = $perms[$i]->id;
        $this->permissions = Permission::all();
    }

    public function update(){
        $this->validate();
        $update = User::findOrfail($this->user_id);
        $update->name = $this->name;
        $update->email = $this->email;
        $update->password = $this->password;
        if($update->update()){

            session()->flash('info', 'User successfully updated!');
        }else{
            session()->flash('error', 'User cannot be updated!');
        }
        $this->resetData();
        $this->updateMode = false;
    }
    public function create(){
     
        $this->permissions = Permission::all();
    }


    public function resetData(){
        $this->name = null;
        $this->email = null;
        $this->password = null;
    }



}
