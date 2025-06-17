<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('products', ProductController::class);

// Add your manual routes here if you prefer them over apiResource
// Route::get('products', [ProductController::class, 'index']);
// Route::post('products', [ProductController::class, 'store']);
// Route::get('products/{product}', [ProductController::class, 'show']);
// Route::put('products/{product}', [ProductController::class, 'update']);
// Route::delete('products/{product}', [ProductController::class, 'destroy']);

// ... existing code below this line if any ...