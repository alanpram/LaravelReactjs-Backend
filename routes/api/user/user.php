<?php

use App\Http\Controllers\Api\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/user-detail',[UserController::class,'index'])->middleware('auth:sanctum');