<?php

use App\Http\Controllers\Api\CatagoryApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Fetch Section
Route::get('/users/{id?}',[UserApiController::class,'showuser']);
Route::get('/products/{id?}',[ProductApiController::class,'showproducts']);
Route::get('/catagories/{id?}',[CatagoryApiController::class,'showcatagory']);

// Add/Update/Delete Section
Route::post('/add-user',[UserApiController::class,'adduser']);

Route::post('/add-product',[ProductApiController::class,'addproduct']);
Route::post('/update-product/{id}',[ProductApiController::class,'updateproduct']);

Route::post('/add-catagory',[CatagoryApiController::class,'addcatagory']);
Route::post('/update-catagory/{id}',[CatagoryApiController::class,'updatecatagory']);