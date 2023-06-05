<?php

use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\TrendingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1'], function(){
    Route::apiResource('movies', MovieController::class);
    
});

Route::get('movies/trending', TrendingController::class);