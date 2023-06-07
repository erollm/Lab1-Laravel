<?php

use App\Http\Controllers\Api\ActionController;
use App\Http\Controllers\Api\AdminStats;
use App\Http\Controllers\Api\ComedyController;
use App\Http\Controllers\Api\DocumentariesController;
use App\Http\Controllers\Api\HorrorController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\RomanceController;
use App\Http\Controllers\Api\TrendingController;
use App\Http\Controllers\Api\SearchCall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/movies/trending', TrendingController::class);
Route::get('/movies/Action', ActionController::class);
Route::get('/movies/Comedy', ComedyController::class);
Route::get('/movies/Horror', HorrorController::class);
Route::get('/movies/Romance', RomanceController::class);
Route::get('/movies/Documentaries', DocumentariesController::class);
Route::get('/search/{query}', SearchCall::class);
Route::get('/AdminStats', AdminStats::class);
