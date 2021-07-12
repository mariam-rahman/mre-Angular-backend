<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SlipController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\OnsaleController;
use App\Http\Controllers\ProductConroller;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SubstockController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('user',[UserController::class,'index'])->name('user.index');
Route::delete('user/{user}',[UserController::class,'destroy'])->name('user.destroy');
Route::get('/user/{user}/edit',[UserController::class,'edit'])->name('user.edit');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('category',CategoryController::class);
Route::resource('product',ProductConroller::class);
Route::resource('purchase',PurchaseController::class);

Route::resource('stock',StockController::class);
Route::get('stockDisplay',[StockController::class,'stockDispaly'])->name('stock.display');
Route::resource('onsale',OnsaleController::class);
Route::resource('customer',CustomerController::class);

Route::post('moveToOnSale/{purchaseId}',[PurchaseController::class,'moveToOnSale'])->name('moveToOnSale');
Route::get('moveToOnSale/{purchaseId}',[PurchaseController::class,'showOnSaleForm'])->name('showOnSaleForm');

Route::resource('employee',EmployeeController::class);
Route::post('stock/move/{product_id}',[StockController::class,'moveTo'])->name('stock.move');
Route::get('stock/moveForm/{product_id}',[StockController::class,'moveForm'])->name('stock.moveForm');

Route::resource('slip',SlipController::class);
Route::get('employee/payform/{employee_id}',[EmployeeController::class,'payForm'])->name('employee.payForm');
Route::post('employee/pay',[EmployeeController::class,'pay'])->name('employee.pay');

Route::resource('substock',SubstockController::class);
Route::get('substock/move-item/{product_id}',[SubstockController::class,'moveItemForm'])->name('substock.move');
Route::get('substock/item/details/{product_id}',[SubstockController::class,'details'])->name('substock.details');

Route::resource('sale',SaleController::class);

Route::resource('expense',ExpenseController::class);