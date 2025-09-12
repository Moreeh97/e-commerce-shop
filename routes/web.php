<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;

use App\Http\Controllers\AdminController;

Route::get('/', [TemplateController::class, 'index']);
Route::get('/products', [StoreController::class, 'products'])->name('products');
Route::get('/product/{id}', [StoreController::class, 'productDetails'])->name('product.details');
Route::get('/cart', [StoreController::class, 'cart'])->name('cart');
Route::get('/contact', [StoreController::class, 'contact'])->name('contact');
Route::get('/about-us', [StoreController::class, 'about'])->name('about-us');



Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/products', [AdminController::class,'products'])->name('products');
    Route::get('/categories', [AdminController::class,'categories'])->name('categories');
});