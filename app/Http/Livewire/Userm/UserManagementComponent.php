<?php

namespace App\Http\Livewire\Userm;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class UserManagementComponent extends Component
{
    public $name ,$users, $permissions, $password,$password_confirmation,$email
    ;

    public function render()
    {
        $this->permissions = Permission::all();
        $this->users = User::latest()->get();
        return view('livewire.userm.user-management-component');
    }

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:4',
        'password_confirmation'=>'required|same:password'
    ];
    public function updated($property)
    {
        $this->validateOnly($property);
    }
    public function save(){
        $this->validate();

        $user = new User();
        $user->name = $this->name;
        $user->name = $this->email;
        $user->password = $this->password;
        $user->save();
    }
}
