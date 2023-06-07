<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\genre;
use App\Models\movie;
use App\Models\User;
use App\Models\Watchlist;
use Illuminate\Http\Request;

class AdminStats extends Controller
{
    function __invoke(){
        $movies = movie::count();
        $users = User::count();
        $watchlist = Watchlist::where('watched_status', "1")->count();


        $genres = Genre::query()
        ->select('genres.id', 'genres.genre', DB::raw('COUNT(*) as count'))
        ->join('movie_genre', 'genres.id', '=', 'movie_genre.genre_id')
        ->join('movies', 'movie_genre.movie_id', '=', 'movies.id')
        ->join('watchlist', 'movies.id', '=', 'watchlist.movie_id')
        ->where('watchlist.watched_status', '=', '1')
        ->groupBy('genres.id', 'genres.genre')
        ->orderBy('count', 'desc')
        ->get();
    
    
        $genreCounts = [];
        
        foreach ($genres as $genre) {
            $genreCounts[$genre->id] = [$genre->genre, $genre->count];
        }
        $data = [
            'movieCount' => $movies,
            'userCount' => $users,
            'moviesWatched' => $watchlist,
            'genres' => $genreCounts
        ];

        return response()->json(['data' => $data]);


    }
}
