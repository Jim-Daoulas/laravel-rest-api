<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


Route::get('/', [AppController::class, 'index']);

Route::apiResource('categories', CategoryController::class);
Route::apiResource('brands', BrandController::class);
Route::apiResource('products', ProductController::class);

// Route::get("/products", [ProductController::class, 'index']);
// Route::post("/products", [ProductController::class, 'store']);
// Route::get("/products/{id}", [ProductController::class, 'show']);
// Route::put("/products/{id}", [ProductController::class, 'update']);
// Route::delete("/products/{id}", [ProductController::class, 'destroy']);


// Route::prefix("products")->group(function(){
//     Route::get("", [ProductController::class, 'index']);
//     Route::post("", [ProductController::class, 'store']);

//     Route::prefix("{id}")->group(function(){
//         Route::get("", [ProductController::class, 'show']);
//         Route::put("", [ProductController::class, 'update']);
//         Route::delete("", [ProductController::class, 'destroy']);
//     });
// });

// Route::prefix("products")->group(base_path("routes/products.php"));