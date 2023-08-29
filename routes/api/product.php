<?php

use App\Http\Controllers\Api\Product\BestCategoryController;
use App\Http\Controllers\Api\Product\ProductBestCategoryController;
use App\Http\Controllers\Api\Product\ProductController;
use App\Http\Controllers\Api\Product\ProductNewController;
use App\Http\Controllers\Api\Product\ProductTopController;
use App\Repositories\ProductCategoryRepository;
use Illuminate\Support\Facades\Route;

Route::get('/product/top',[ProductTopController::class,'index']);
Route::get('/product/best-category',[ProductBestCategoryController::class,'index']);
Route::get('/product/new',[ProductNewController::class,'index']);
Route::get('/product-list/{category}',[ProductController::class,'index']);
Route::get('/product-detail/{slug}',[ProductController::class,'show']);
Route::get('/product-filter',[ProductController::class,'filter']);