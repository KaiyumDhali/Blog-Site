<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/product-details/{id}', [HomeController::class,'details'])->name('product.details');
Route::get('/admin-dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');


    Route::get('/add-product',[ProductController::class,'addView'])->name('add.product');
    Route::post('/new-product',[ProductController::class,'newProduct'])->name('new.product');

    Route::get('/manage-product',[ProductController::class,'manageProduct'])->name('manage.product');


    Route::get('/update-product/{id}',[ProductController::class,'update'])->name('update.product');
    Route::post('/edit-product/{id}',[ProductController::class,'edit'])->name('edit.product');
    Route::get('/delete-product/{id}',[ProductController::class,'delete'])->name('delete.product');




});
