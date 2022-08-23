<?php

use App\Http\Controllers\DownloadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\v2\OnSaleController;
use App\Http\Controllers\v2\ApiAuthController;
use App\Http\Controllers\v2\ApiSaleController;
use App\Http\Controllers\v2\ApiUserController;
use App\Http\Controllers\v2\ApiProductController;
use App\Http\Controllers\v2\ApiCategoryController;
use App\Http\Controllers\v2\ApiCustomerController;
use App\Http\Controllers\v2\ApiEmployeeController;
use App\Http\Controllers\v2\ApiPurchaseController;
use App\Http\Controllers\v2\ApiSubStockController;
use App\Http\Controllers\v2\ApiMainStockController;
use App\Http\Controllers\OnsaleController as ControllersOnsaleController;
use App\Http\Controllers\v2\AccessController;
use App\Http\Controllers\v2\ApiBannerController;
use App\Http\Controllers\v2\ApiDashboardController;
use App\Http\Controllers\v2\ApiExpenseController;
use App\Http\Controllers\v2\ApiHomeinfoController;
use App\Http\Controllers\v2\ApiSliderController;
use App\Http\Controllers\v2\ApiWebCategoryController;
use App\Http\Controllers\v2\ApiWebpageController;
use App\Http\Controllers\v2\ApiWebproductController;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
// Route::get('category',[ApiController::class,'category']);
// Route::post('category',[ApiController::class,'store']);
// Route::delete('category',[ApiController::class,'delete']);
// Route::get('products',[ApiController::class,'products']);
//     Route::resource('home','V'.$version.homeController::class);
// });

// Route::get('user',function(){
//     return Hash::make('1234');
// });




Route::post('test', [TestController::class, 'test']);
Route::post('login', [ApiAuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('config', [ApiAuthController::class, 'config']);
    Route::get('profile', [ApiAuthController::class, 'profile']);
    Route::put('users/update/{id}', [ApiAuthController::class, 'update']);
    Route::put('users/cpassword', [ApiAuthController::class, 'changePassword']);
    Route::post('users/upload-image', [ApiAuthController::class, 'changeUserPhoto']);
    Route::resource('users', ApiUserController::class);

    //Category
    Route::resource('category', ApiCategoryController::class);
    Route::delete('category/delete/{id}',[ApiCategoryController::class,'categoryDelete']);
    //Product
    Route::prefix('product')->group(function () {
        Route::post('list', [ApiProductController::class, 'list']);
        Route::get('{id}', [ApiProductController::class, 'show']);
        Route::post('add', [ApiProductController::class, 'add']);
        Route::get('{id}/edit', [ApiProductController::class, 'edit']);
        Route::put('update', [ApiProductController::class, 'update']);
        Route::delete('{id}/delete', [ApiProductController::class, 'delete']);
    });


    //Purchase
    Route::post('purchase/list', [ApiPurchaseController::class, 'list']);
    Route::put('purchase/{id}/update', [ApiPurchaseController::class, 'update']);
    Route::get('product-list', [ApiProductController::class, 'productList']);
    Route::post('purchase-create', [ApiPurchaseController::class, 'create']);
    Route::get('purchase/{id}/edit', [ApiPurchaseController::class, 'edit']);
    Route::delete('purchase/{id}/delete', [ApiPurchaseController::class, 'delete']);

    //SubStock 
    Route::post('substock/list', [ApiSubStockController::class, 'list']);
    Route::get('substock/details/{id}', [ApiSubStockController::class, 'details']);
    Route::post('substock/moveOnSale', [ApiSubStockController::class, 'moveOnSale']);
    Route::post('substock/restoreData', [ApiSubStockController::class, 'restoreData']);

    //Employee
    Route::get('employee/list', [ApiEmployeeController::class, 'list']);
    Route::post('employee/add', [ApiEmployeeController::class, 'add']);
    Route::get('employee/{id}/showEmployee', [ApiEmployeeController::class, 'showEmp']);
    Route::get('employee/{id}/promotion', [ApiEmployeeController::class, 'promotion']);
    Route::post('employee/addPromotion', [ApiEmployeeController::class, 'addPromotion']);
    Route::get('employee/{id}/editPromotion', [ApiEmployeeController::class, 'editPromotion']);
    Route::post('employee/updatePromotion', [ApiEmployeeController::class, 'updatePromotion']);
    Route::delete('employee/{id}/deleteEmployee', [ApiEmployeeController::class, 'deleteEmployee']);
    Route::get('employee/{id}/editEmployee', [ApiEmployeeController::class, 'editEmployee']);
    Route::post('employee/{id}/employeeUpdate', [ApiEmployeeController::class, 'employeeUpdate']);
    Route::get('employee/getsalary/{id}',[ApiEmployeeController::class,'getSalary']);
    Route::get('employee/getemp/{id}',[ApiEmployeeController::class,'EmpDetailsForSalary']);
    Route::post('employee/addsalary',[ApiEmployeeController::class,'addSalary']);

    //Main Stock
    Route::post('mainStock/list', [ApiMainStockController::class, 'list']);
    Route::get('mainStock/{id}/details', [ApiMainStockController::class, 'details']);
    Route::post('mainStock/move-to-sub', [ApiMainStockController::class, 'moveToSubstock']);
    Route::post('mainStock/moveOnSsale', [ApiMainStockController::class, 'moveOnSsale']);

    //OnSale
    Route::post('onsales/list', [OnSaleController::class, 'list']);
    Route::get('onsales/{id}/OnSaleDetails', [OnsaleController::class, 'OnSaleDetails']);



    //Customer    
    Route::get('customer/list', [ApiCustomerController::class, 'list']);
    Route::post('customer/add', [ApiCustomerController::class, 'add']);
    Route::get('customer/customer-details/{id}', [ApiCustomerController::class, 'customerDetails']);
    Route::get('customer/customer-debt/{id}', [ApiCustomerController::class, 'customerDebt']);
    Route::get('customer/customeredit/{id}', [ApiCustomerController::class, 'customerEdit']);
    Route::post('customer/updatecustomer', [ApiCustomerController::class, 'updateCustomer']);
    Route::get('customer/debtdetails/{id}', [ApiCustomerController::class, 'debtDetails']);
    Route::post('customer/pay', [ApiCustomerController::class, 'pay']);




    //Sales

    Route::post('sale/list', [ApiSaleController::class, 'list']);
    Route::post('sale/create-sell-product', [ApiSaleController::class, 'createSellProduct']);
    Route::get('sale/customerList', [ApiSaleController::class, 'customerList']);
    Route::post('sale/add', [ApiSaleController::class, 'add']);
    Route::get('sale/sell-product-list/{id}', [ApiSaleController::class, 'saleList']);
    Route::get('sale/product-list/{stockId}', [ApiSaleController::class, 'getProduct']);
    Route::post('sale/add-payment', [ApiSaleController::class, 'addPayment']);
    Route::get('sale/print-invoice/{id}', [ApiSaleController::class, 'printInvoice']);
    Route::post('sale/delete-sell-details', [ApiSaleController::class, 'deleteSoldProduct']);
    Route::post('sale/edit-sell-product', [ApiSaleController::class, 'editSoldProduct']);
    Route::post('sale/update-sell-product', [ApiSaleController::class, 'updateSellProduct']);
    Route::delete('sale/delete-sale/{sale_id}', [ApiSaleController::class, 'deleteSale']);
    Route::get('sale/sale-details/{id}', [ApiSaleController::class, 'saleDetailsList']);

    //Expeneses  daily-expenses-list
    Route::get('expeneses/list', [ApiExpenseController::class, 'list']);
    Route::post('expeneses/add', [ApiExpenseController::class, 'addExpenes']);
    Route::post('expeneses/add-details', [ApiExpenseController::class, 'addDetails']);
    Route::get('expeneses/exp-List', [ApiExpenseController::class, 'expList']);
    Route::get('expeneses/employees-List', [ApiExpenseController::class, 'employeesList']);
    Route::post('expeneses/daily-expenses-list/{id}', [ApiExpenseController::class, 'dailyExpensesList']);
    Route::delete('expeneses/daily-expen-delete/{id}', [ApiExpenseController::class, 'dailyExpenDelete']);

    Route::prefix('expense')->group(function(){
      Route::get('list',[ApiExpenseController::class,'list']);
      Route::post('add',[ApiExpenseController::class,'create']);
      Route::put('update/{id}',[ApiExpenseController::class,'update']);
      Route::delete('delete/{id}',[ApiExpenseController::class,'delete']);
      Route::get('details/{id}',[ApiExpenseController::class,'details']);
      Route::post('child/list/{id}',[ApiExpenseController::class,'childList']);
      Route::post('child/add',[ApiExpenseController::class,'childCreate']);
      Route::delete('child/delete/{id}',[ApiExpenseController::class,'childDelete']);
      Route::put('child/update/{id}',[ApiExpenseController::class,'childUpdate']);
    });

    //dashboard
    Route::prefix('summary')->group(function () {
        Route::get('counts', [ApiDashboardController::class, 'getCounts']);
        Route::get('chart/{yr}', [ApiDashboardController::class, 'saleChart']);
        Route::get('date', [ApiDashboardController::class, 'getDate']);
    });



    Route::prefix('access')->group(function () {
        Route::get('permissions/list', [AccessController::class, 'permissionsList']);
        Route::get('roles/list', [AccessController::class, 'roleList']);
        Route::post('roles/create', [AccessController::class, 'createRole']);
        Route::delete('role/delete/{id}', [AccessController::class, 'deleteRole']);
        Route::get('role/edit/{id}', [AccessController::class, 'roleEdit']);
        Route::get('permission/{id}', [AccessController::class, 'getpermission']);
        Route::delete('permission/delete/{id}', [AccessController::class, 'deletePermission']);
        Route::post('permission/add',[AccessController::class,'addPermission']);
        Route::get('edit/permission/{id}',[AccessController::class],'editPermission');
    });
    Route::prefix('download')->group(function(){
      Route::post('sale',[DownloadController::class,'sale']);
      Route::post('product',[DownloadController::class,'product']);
    });
});
Route::get('slider',[ApiSliderController::class,'SubTitleList']);
    ///webpage
    Route::get('webpage/bannerlist',[ApiWebpageController::class,'bannerlist']);
    Route::get('webpage/categorylist',[ApiWebpageController::class,'categorylist']);
    Route::get('webpage/productlist',[ApiWebpageController::class,'productlist']);
    Route::get('webpage/homeinfolist',[ApiWebpageController::class,'homeinfolist']);
    Route::get('webpage/filter/{id}',[ApiWebpageController::class,'filter']);
   

    //Web Banner
    Route::prefix('banner')->group(function(){
      Route::get('list',[ApiBannerController::class,'list']);
      Route::post('add',[ApiBannerController::class,'add']);
      Route::delete('delete/{id}',[ApiBannerController::class,'delete']);
    });


    //Web Category
    Route::get('webcategory/list',[ApiWebCategoryController::class,'list']);
    Route::post('webcategory/addwebcategory',[ApiWebCategoryController::class,'add']);
    Route::delete('webcategory/delete/{id}',[ApiWebCategoryController::class,'delete']);

    // Web Product
    Route::get('webproduct/list',[ApiWebproductController::class,'list']);
    Route::post('webproduct/add',[ApiWebproductController::class,'add']);
    Route::delete('webproduct/delete/{id}',[ApiWebproductController::class,'delete']);
    Route::get('webpage/category-filter/{id}',[ApiWebproductController::class,'categoryFilter']);
    

    //HomeInfo
    Route::get('homeinfo/list',[ApiHomeinfoController::class,'list']);
    Route::post('homeinfo/add',[ApiHomeinfoController::class,'add']);
    Route::delete('homeinfo/delete/{id}',[ApiHomeinfoController::class,'delete']);