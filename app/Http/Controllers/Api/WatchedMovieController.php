<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WatchedMovieController extends Controller
{
    public function __invoke($user_id){
        $watchlist = DB::table('watchlist')
            ->join('movies', 'watchlist.movie_id', '=', 'movies.id')
            ->select('watchlist.*', 'movies.*')
            ->where('watchlist.user_id', $user_id)
            ->where('watchlist.watched_status', 1)
            ->get();

        return response()->json($watchlist);

    }
}
