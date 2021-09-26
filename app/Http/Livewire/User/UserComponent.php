<?php

namespace App\Http\Livewire\User;

use Illuminate\Auth\Events\Attempting;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserComponent extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.user.user-component');
    }



    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function login()
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password]))
            return redirect(route('dashboard.index'));
        else {
            $this->clearData();
            session()->flash('message', 'Your username or password is wrong');
        }
    }

    public function clearData()
    {
        $this->email = null;
        $this->password = null;
    }
}
