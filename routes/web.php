<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OnsaleController;
use App\Http\Controllers\ProductConroller;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.index');
Route::view('note','summernote');
Route::view('form','form');
Route::view('table','datatable');
Route::view('modal','modals');
Route::view('dropdown','dropdown');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('category',CategoryController::class);
Route::resource('product',ProductConroller::class);
Route::resource('purchase',PurchaseController::class);
Route::resource('stock',StockController::class);
Route::resource('onsale',OnsaleController::class);

