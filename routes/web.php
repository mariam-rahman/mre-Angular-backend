<?php

use Livewire\Livewire;
use App\Models\Purchase;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Livewire\LoginComponent;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MresController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SlipController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\OnsaleController;
use App\Http\Controllers\ProductConroller;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SubstockController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SendEmailController;
use App\Http\Livewire\Category\CategoryComponent;
use App\Http\Livewire\Employee\EmployeeComponent;
use App\Http\Livewire\EmployeeComponent\Employee;
use Illuminate\Routing\RouteGroup;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

//use App\Http\Livewire\CategoryComponent;

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

Route::view('index','index');
// Route::get('make',function(){
//     return Hash::make("1234");
// });


Auth::routes();

Route::middleware('auth')->group(function(){
//Dashboard
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.index');
Route::post('dashboard/chart',[DashboardController::class,'chart_value'])->name('dashboard.chart_value');


//email
Route::post('sent',[SendEmailController::class,'contactFormEmail'])->name('send.email');

//user
Route::get('user',[UserController::class,'index'])->name('user.index');
Route::post('user/store',[UserController::class,'store'])->name('user.store');
Route::delete('user/{user}',[UserController::class,'destroy'])->name('user.destroy');
Route::get('/user/{user}/edit',[UserController::class,'edit'])->name('user.edit');
Route::put('user/{user}/update',[UserController::class,'update'])->name('user.update');
Route::get('user/create',[UserController::class,'create'])->name('user.create');

//Permissions

//Categories livewire
Route::view('category','admin/category/index')->name('category');


//Products  livewire
Route::view('product','admin/product/index')->name('product.index');

//customer livewire
Route::view('customer','admin/customer/index')->name('customer.index');

//Employee livewire
Route::resource('employee',EmployeeController::class);

//Purchase livewire
Route::view('purchase','admin/purchase/index')->name('purchase.index');

//Permission livwwire
Route::resource('permission',PermissionController::class);


// // //employee
// // Route::resource('employee',EmployeeController::class);
// // Route::post('employee/promote',[EmployeeController::class,'promote'])->name('employee.promote');
// Route::get('employee/payform/{employee}',[EmployeeController::class,'payForm'])->name('employee.payForm');
// Route::post('employee/pay',[EmployeeController::class,'pay'])->name('employee.pay');

//Purchase
//Route::resource('purchase',PurchaseController::class);
//Route::get('purchase/details/{x}',[PurchaseController::class,'index'])->name('purchase.details');

//Stock
Route::resource('stock',StockController::class);

//onsale
Route::resource('onsale',OnsaleController::class);
// Route::get('onsale/sellForm/{product_id}',[OnsaleController::class,'sellForm'])->name('onsale.sellform');
// Route::post('onsale/sellStore/{product_id}',[OnsaleController::class,'sellStore'])->name('onsale.sellStore');
// Route::get('onsale/details/{product_id}',[OnsaleController::class,'details'])->name('onsale.details');

// Route::post('moveToOnSale/{purchaseId}',[PurchaseController::class,'moveToOnSale'])->name('moveToOnSale');
// Route::get('moveToOnSale/{purchaseId}',[PurchaseController::class,'showOnSaleForm'])->name('showOnSaleForm');



//Main stock
Route::post('stock/move/{product_id}',[StockController::class,'moveTo'])->name('stock.move');
Route::get('stock/moveForm/{product_id}',[StockController::class,'moveForm'])->name('stock.moveForm');
Route::get('stock/item/details/{product_id}',[StockController::class,'details'])->name('stock.details');
Route::get('stock/sale/{product_id}',[StockController::class,'stockSaleForm'])->name('stock.saleForm');
Route::post('stock/sellStore/{product_id}',[StockController::class,'sellStore'])->name('stock.sellStore');



Route::resource('slip',SlipController::class);
//substock
Route::resource('substock',SubstockController::class);
Route::get('substock/move-item/{product_id}',[SubstockController::class,'moveItemForm'])->name('substock.move');
Route::get('substock/item/details/{product_id}',[SubstockController::class,'details'])->name('substock.details');
Route::post('substock/item/move-to-sell/{product_id}',[SubstockController::class,'MoveToSell'])->name('substock.move_to_sell');
Route::get('substock/sellForm/{product_id}',[SubstockController::class,'sellForm'])->name('substock.sellForm');
Route::post('substock/sellStore/{product_id}',[SubstockController::class,'sellstore'])->name('substock.sellStore');

//sale
Route::resource('sale',SaleController::class);
//Route::post('sell',[SaleController::class,'sell'])->name('sale.sell');

Route::get('invoice/{id}',[SaleController::class,'printInvoice'])->name('sale.invoice');
Route::get('notification/{id}',[SaleController::class,'viewNotification'])->name('sale.notification');




Route::resource('expense',ExpenseController::class);
Route::get('substock/pdf/view', [SubstockController::class, 'createPDF'])->name('substock.pdf');

Route::get('sell-detail/{id}',[SaleController::class,'sell_detail'])->name('sale.sell_detail');


Route::view('notification','admin/notification/notificationDetails');
});

//belong to website
Route::get('/',[MresController::class,'view_category'])->name('view.index');
Route::get('Mres.image_deatils/{product}',[MresController::class,'image_deatils'])->name('Mres.image_deatils');

Route::get('view/about',[MresController::class,'about'])->name('view.about');
Route::get('view/product',[MresController::class,'view_product'])->name('view.product');
Route::get('view/contact',[MresController::class,'contact'])->name('view.contact');
Route::get('view/category-filer/{category}',[MresController::class,'category_filter'])->name('category.filter');
//End



//Route::get('category',CategoryComponent::class);


