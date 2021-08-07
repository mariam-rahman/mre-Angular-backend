<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class LoginComponent extends Component
{
    public function render()
    {
        return view('livewire.login-component');
    }


    public $name;
    public $email;

    protected $rules = [

        'email' => 'required|email',
    ];

    public function submit()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.

        User::create([
            'name' => $this->name,
            'email' => $this->email,
        ]);
    }
}
