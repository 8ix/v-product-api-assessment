<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// AUTH ROUTES
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:sanctum');

Route::get('/products', [ProductController::class, 'index'])
    ->middleware(
        'throttle:' . config('throttle.products.max_attempts') . ',' . config('throttle.products.decay_minutes')
);

