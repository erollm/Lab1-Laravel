<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Watchlist;
use Illuminate\Http\Request;

class WatchlistRowsCountController extends Controller
{
    public function __invoke($movie_id, $user_id){

        $rows = Watchlist::where('movie_id', $movie_id)->where('user_id', $user_id)->first();

        return response()->json($rows);
    }
}
