<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ProductController;
use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\Api\v1\AuthController;

Route::prefix('v1')->group(function () {

    // Rate limit applies to all v1 routes (can use 'throttle:api' or custom numbers)
    Route::middleware(['throttle:60,1'])->group(function () {

        // Public endpoints
        Route::get('products', [ProductController::class, 'index']);
        Route::get('products/{product}', [ProductController::class, 'show']);
        Route::get('categories', [CategoryController::class, 'index']);
        Route::get('categories/{category}', [CategoryController::class, 'show']);

        // Auth: register / login (for token generation)
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);

        // Protected endpoints — store/update/delete require Sanctum auth
        Route::middleware('auth:sanctum')->group(function () {
            Route::post('products', [ProductController::class, 'store']);
            Route::put('products/{product}', [ProductController::class, 'update']);
            Route::delete('products/{product}', [ProductController::class, 'destroy']);

            Route::post('categories', [CategoryController::class, 'store']);
            Route::put('categories/{category}', [CategoryController::class, 'update']);
            Route::delete('categories/{category}', [CategoryController::class, 'destroy']);

            // token revoke
            Route::post('logout', [AuthController::class, 'logout']);
        });
    });
});
