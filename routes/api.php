<?php

use App\Http\Controllers\Api\ActionController;
use App\Http\Controllers\Api\ComedyController;
use App\Http\Controllers\Api\DocumentariesController;
use App\Http\Controllers\Api\HorrorController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\RomanceController;
use App\Http\Controllers\Api\TrendingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1'], function(){
    Route::apiResource('movies', MovieController::class);
    
});

Route::get('/movies/trending', TrendingController::class);
Route::get('/movies/Action', ActionController::class);
Route::get('/movies/Comedy', ComedyController::class);
Route::get('/movies/Horror', HorrorController::class);
Route::get('/movies/Romance', RomanceController::class);
Route::get('/movies/Documentaries', DocumentariesController::class);
