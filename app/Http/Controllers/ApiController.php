<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiController extends Controller
{

// function __construct()
// {
//     $this->middleware('auth:api')->except('login');
// }
    function login(Request $request){

        $credentials = $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials)){
          $token = JWTAuth::fromUser(Auth::user());
          return response()->json(['token'=>$token]);
        } 
       return null;
    }

    function logout(){
        auth::logout();
    }
    function getUsers(){
        return User::all();
    }

    function category(){
        return Category::all();
    }

    function store(Request $request){
    
   return response()->json($request->name);
    }
    function products(){
        return Product::all();
    }
}
