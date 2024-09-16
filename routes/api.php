<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index'])
    ->middleware(
        'throttle:' . config('throttle.products.max_attempts') . ',' . config('throttle.products.decay_minutes')
);

