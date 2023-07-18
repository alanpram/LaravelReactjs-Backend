<?php

use App\Http\Controllers\Api\Banner\BannerController;
use Illuminate\Support\Facades\Route;

Route::get('/banner',[BannerController::class,'index']);
