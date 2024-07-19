<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,"index"]);
Route::get('/dashboard',[HomeController::class,"login_home"])->middleware(['auth', 'verified'])->name('dashboard');;



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::delete('delete/{id}', [CategoryController::class, "delete"])->name('delete');
Route::get('admin/dashboard',[HomeController::class,"admin"])->middleware(['auth','admin']);
Route::get('admin/category_name',[CategoryController::class,"category"])->middleware(['auth','admin']);
Route::post('admin/category_name',[CategoryController::class,"add_category"])->middleware(['auth','admin']);
Route::get('edit/{id}',[CategoryController::class,"edit"]);
Route::post('update/{id}',[CategoryController::class,"update"]);
Route::get('add_product',[CategoryController::class,"add_product"]);
Route::post('include_product',[CategoryController::class,"include_product"]);
Route::get('view_product',[CategoryController::class,"view_product"]);
Route::get('delete_product/{id}',[CategoryController::class,"delete_product"]);
Route::get('edit_product/{id}',[CategoryController::class,"edit_product"]);
Route::post('update_product/{id}',[CategoryController::class,"update_product"]);
Route::get('product_search',[CategoryController::class,"product_search"]);
Route::get('product_details/{id}',[HomeController::class,"product_details"]);
Route::post('add_cart/{id}',[HomeController::class,"add_cart"]);
Route::get('mycart',[HomeController::class,"mycart"]);
Route::post('confirm_order',[HomeController::class,"confirm_order"]);
Route::get('view_orders',[CategoryController::class,"view_orders"]);
Route::get('on_the_way/{id}',[CategoryController::class,"on_the_way"]);
Route::get('delivered/{id}',[CategoryController::class,"delivered"]);
Route::get('download_pdf/{id}',[CategoryController::class,"download_pdf"]);
Route::get('myorders',[HomeController::class,"myorders"]);

