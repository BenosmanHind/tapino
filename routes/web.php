<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmplacementController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\LoadController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/admin/categories',CategoryController::class)->middleware('can:admin');
Route::resource('admin/emplacements',EmplacementController::class)->middleware('can:admin');
Route::resource('admin/products',ProductController::class)->middleware('can:admin');
Route::resource('admin/stocks',StockController::class)->middleware('can:admin');
Route::resource('admin/professionals',ProfessionalController::class)->middleware('can:admin');
Route::get('productlines/{id}', [App\Http\Controllers\ProductController::class, 'productlines'])->middleware('can:admin');
Route::get('add-stock/{id}', [App\Http\Controllers\StockController::class, 'modalAddStock'])->middleware('can:admin');
Route::resource('/admin/loads',LoadController::class)->middleware('can:admin');
Route::resource('/admin/vendors',VendorController::class)->middleware('can:admin');
Route::resource('/admin/workers',WorkerController::class)->middleware('can:admin');
Route::resource('/admin/salaries',SalaryController::class)->middleware('can:admin');


//sale pro
Route::get('admin/sale-pro-one', [App\Http\Controllers\SaleController::class, 'saleProOne'])->middleware('can:admin');
Route::post('admin/sale-pro-two', [App\Http\Controllers\SaleController::class, 'saleProTwo'])->middleware('can:admin');
Route::post('admin/edit-sale-pro-two', [App\Http\Controllers\SaleController::class, 'editSaleProTwo'])->middleware('can:admin');
Route::post('admin/store-sale', [App\Http\Controllers\SaleController::class, 'storeSale']);
Route::post('admin/update-sale', [App\Http\Controllers\SaleController::class, 'update']);
Route::get('admin/get-pro-info/{id}', [App\Http\Controllers\SaleController::class, 'proInfo'])->middleware('can:admin');
Route::resource('admin/professional-sales',SaleController::class)->middleware('can:admin');
Route::get('admin/sale-detail/{id}', [App\Http\Controllers\SaleController::class, 'saleDetail'])->middleware('can:admin');
Route::get('admin/professional-sales', [App\Http\Controllers\SaleController::class, 'saleProfessional'])->middleware('can:admin');
Route::get('admin/customer-sales', [App\Http\Controllers\SaleController::class, 'saleCustomer'])->middleware('can:admin');

// pos system

Route::resource('admin/pos',PosController::class);
Route::resource('admin/sales-customer',PosController::class);
Route::resource('admin/customers',CustomerController::class);
Route::resource('/admin',AdminController::class)->middleware('can:admin');
