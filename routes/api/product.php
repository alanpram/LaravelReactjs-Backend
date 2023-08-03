<?php

use App\Http\Controllers\Api\Product\ProductTopController;
use Illuminate\Support\Facades\Route;

Route::get('/product/top',[ProductTopController::class,'index']);
