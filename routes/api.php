<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;


use App\Http\Controllers\Auth\AuthenticatedSessionController;

// AUTH ROUTES
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:sanctum');

// API PUBLIC ROUTES
Route::get('/products', [ProductController::class, 'index'])
    ->middleware(
        'throttle:' . config('throttle.products.max_attempts') . ',' . config('throttle.products.decay_minutes')
);

// API PROTECTED ROUTES
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/admin/products', [AdminProductController::class, 'store']);
    Route::delete('/admin/products/{product}', [AdminProductController::class, 'destroy']);

    Route::post('/admin/categories', [AdminCategoryController::class, 'store']);
    Route::delete('/admin/categories/{category}', [AdminCategoryController::class, 'destroy']);
});

