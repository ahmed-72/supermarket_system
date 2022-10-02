<?php

use App\Http\Controllers\BillsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemsController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/',[HomeController::class,'index'])->name('home');
Route::resource('bill',BillsController::class);
Route::resource('customer',CustomersController::class)->except('update');
Route::put('customer/update',[CustomersController::class,'update'])->name('customer.update');
Route::resource('item',ItemsController::class)->except('update');
Route::put('item/update',[ItemsController::class,'update'])->name('item.update');
Route::put('item/{id}/remove_category',[ItemsController::class,'remove_category'])->name('item.removeCategory');
Route::resource('category',CategoriesController::class)->except('update');
Route::put('category/update',[CategoriesController::class,'update'])->name('category.update');



