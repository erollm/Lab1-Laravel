<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWatchlist;
use App\Http\Resources\api\MovieResource;
use App\Models\Watchlist;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    // public function index(Request $request){
    //     $movie_id = $request->movie_id;
    //     $user_id = $request->user_id;

    //     $query = Watchlist::where('user_id', $user_id)->where('movie_id', $movie_id)->get();

    //     return new MovieResource([$query]);
    // }

    public function __invoke(StoreWatchlist $request){
        Watchlist::create($request->validated());
        return response()->json('Movie Created!');
    }
}