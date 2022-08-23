<?php

namespace App\Http\Controllers\v2;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{

    function login(Request $request)
    {

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = JWTAuth::fromUser($user);
            $perms = [];
            $isAdmin = $user->isAdmin;
            if(!$isAdmin)
            $perms = $user->role->permissions->pluck('name');
            return response()->json([
                'token' => $token,
                'authorities' => $perms,
                'isAdmin'=>$isAdmin
            ]);
        }

        return null;
    }

    function logout()
    {
        auth::logout();
    }

    function config()
    {
        if (Auth::check())
            return array(
                'authenticated' => true
            );
        else
            return null;
    }


    function profile()
    {
        return Auth::user();
    }


    function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->phone_no = $request->phone_no;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->save();
        return true;
    }

    function changePassword(Request $request)
    {
        $auth = Auth::user();
       $user = User::find($auth->id);
       log::info('password ',$request->all());
        if (Hash::check( $request->currentPassword,$user->password)) {
            $user->password = Hash::make($request->newPassword);
            $user->save();
            return response()->json(true);
        }

        return null;
    }


    function changeUserPhoto(Request $request){
        log::info('photo ', $request->all());
        $user = User::find($request->id);
      $path =  $request->avatar->store('users','public');
      $user->photo = $path;
      $user->save();
      return true;
    }

    
}
