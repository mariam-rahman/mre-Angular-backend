<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin/user/index',compact('users'));
    }

    public function destroy(User $user){
        $user->delete();
        return redirect(route('user.index'));
    }

    public function edit(User $user){
        return view('admin/user/edit',compact('user'));
    }
}
