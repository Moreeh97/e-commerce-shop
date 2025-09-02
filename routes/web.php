<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ProductController;

Route::get('/', [TemplateController::class, 'index']);
Route::get('/products', [TemplateController::class, 'show']);
Route::get('/product-details', [TemplateController::class, 'details']);
Route::get('/about-us', [TemplateController::class, 'about']);
Route::get('/contact', [TemplateController::class, 'contact']);

