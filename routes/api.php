<?php

use App\Http\Controllers\ApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('user',function(){
//     return response()->json(User::all());
// });
Route::post('user/login',[ApiController::class,'login']);
Route::get('users',[ApiController::class,'getUsers']);
Route::post('user/logout',[ApiController::class,'logout']);
Route::get('category',[ApiController::class,'category']);
