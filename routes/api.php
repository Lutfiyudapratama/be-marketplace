<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('product-types', ProductTypeController::class);
Route::post('register', [Authcontroller::class, 'register']);
Route::post('auth', [Authcontroller::class, 'auth']);   

    
Route::group([
    'middleware' => 'auth:sanctum'
], function () {
    Route::post('product', [ProductController::class, 'index']);
    Route::post('product-update/{id}', [ProductController::class, 'update']);
});


Route::post('product-update/{id}', [ProductController::class, 'update']);
Route::resource('Banner', BannerController::class);
Route::post('product-update/{id}', [ProductController::class, 'update']);
Route::post('banner-update/{id}', [BannerController::class, 'update']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
