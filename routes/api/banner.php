<?php

use App\Http\Controllers\Api\Banner\BannerController;
use App\Http\Controllers\Api\Banner\ContentPromoController;
use Illuminate\Support\Facades\Route;

Route::get('/banner',[BannerController::class,'index']);
Route::get('/banner/content-promo',[ContentPromoController::class,'index']);
