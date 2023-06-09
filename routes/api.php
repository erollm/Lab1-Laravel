<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ActionController;
use App\Http\Controllers\Api\AdminStats;
use App\Http\Controllers\Api\BookmarkedController;
use App\Http\Controllers\Api\ComedyController;
use App\Http\Controllers\Api\DocumentariesController;
use App\Http\Controllers\Api\HorrorController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\RomanceController;
use App\Http\Controllers\Api\TrendingController;
use App\Http\Controllers\Api\SearchCall;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WatchLaterController;
use App\Http\Controllers\Api\WatchlistController;
use App\Http\Controllers\Api\WatchlistRowsCountController;
use App\Http\Controllers\Api\WatchlistUpdateController;
use App\Models\Watchlist;
use App\Http\Controllers\Api\WatchedMovieController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function(){
    Route::apiResource('movies', MovieController::class);
    Route::apiResource('users', UserController::class);
});

Route::post('/watchlist', WatchlistController::class);
Route::get('/watchlist/{movie_id}/{user_id}', WatchlistRowsCountController::class);
Route::put('/watchlist/put', WatchlistUpdateController::class);
Route::get('/bookmark/{user_id}', BookmarkedController::class);
Route::get('/watch_later/{user_id}', WatchLaterController::class);
Route::get('/movies/trending', TrendingController::class);
Route::get('/movies/Action', ActionController::class);
Route::get('/movies/Comedy', ComedyController::class);
Route::get('/movies/Horror', HorrorController::class);
Route::get('/movies/Romance', RomanceController::class);
Route::get('/movies/Documentaries', DocumentariesController::class);
Route::get('/search/{query}', SearchCall::class);
Route::get('/AdminStats', AdminStats::class);
Route::get('/watched_status/{user_id}',WatchedMovieController::class);
