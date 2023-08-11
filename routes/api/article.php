<?php

use App\Http\Controllers\Api\Article\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/article',[ArticleController::class,'index']);