<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmplacementController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
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
Route::get('/admin', function () {
    return view('admin.dashboard-admin');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/admin/categories',CategoryController::class);
Route::resource('admin/emplacements',EmplacementController::class);
Route::resource('admin/products',ProductController::class);
Route::resource('admin/stocks',StockController::class);
Route::get('productlines/{id}', [App\Http\Controllers\ProductController::class, 'productlines']);
Route::get('add-stock/{id}', [App\Http\Controllers\StockController::class, 'modalAddStock']);
