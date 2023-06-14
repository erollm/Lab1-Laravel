<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWatchlist;
use App\Models\Watchlist;
use Illuminate\Http\Request;

class WatchlistUpdateController extends Controller
{
    public function __invoke(StoreWatchlist $request, Watchlist $watchlist)
    {
        $movieId = $request->input('movie_id');
        $userId = $request->input('user_id');
        $watchedStatusInput = $request->input('watched_status');
        $bookmarkedInput = $request->input('bookmarked');
        $watchLaterInput = $request->input('watch_later');

        $watchlistItem = Watchlist::where('movie_id', $movieId)
            ->where('user_id', $userId)
            ->first();

        if (!$watchlistItem) {
            return response()->json(['message' => 'Watchlist item not found'], 404);
        }

        if ($request->has('watched_status')) {
            $watchlistItem->watched_status = $watchedStatusInput;
        }

        if ($request->has('bookmarked')) {
            $watchlistItem->bookmarked = $bookmarkedInput;
        }

        if ($request->has('watch_later')) {
            $watchlistItem->watch_later = $watchLaterInput;
        }

        $watchlistItem->save();

        return response()->json("movie updated");
    }
}