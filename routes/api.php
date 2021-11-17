<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::post('user/login',[ApiController::class,'login']);
// $version = 4;
// Route::middleware('auth:api')->group(function ($version) {
//     Route::get('users',[ApiController::class,'getUsers']);
//     Route::post('user/logout',[ApiController::class,'logout']);
    Route::get('category',[ApiController::class,'category']);
    Route::post('category',[ApiController::class,'store']);
    Route::delete('category',[ApiController::class,'delete']);
    Route::get('products',[ApiController::class,'products']);
//     Route::resource('home','V'.$version.homeController::class);
// });

// Route::get('user',function(){
//     return response()->json(User::all());
// });

