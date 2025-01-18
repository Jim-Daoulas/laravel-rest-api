<?php

use App\Http\Controllers\ProductController;

Route::get("", [ProductController::class, 'index']);
Route::post("", [ProductController::class, 'store']);

Route::prefix("{id}")->group(function(){
    Route::get("", [ProductController::class, 'show']);
    Route::put("", [ProductController::class, 'update']);
    Route::delete("", [ProductController::class, 'destroy']);
});