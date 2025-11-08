<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// inline rate limit for API requests: 10 requests per minute per user or IP address
// Route::middleware('auth:sanctum','throttle:10,1')->group(function () {
Route::middleware('auth:sanctum','throttle:api')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::prefix('v1')->group(function () {
        Route::apiResource('posts', PostController::class);
    });
});

// auth routes
require __DIR__.'/auth.php';