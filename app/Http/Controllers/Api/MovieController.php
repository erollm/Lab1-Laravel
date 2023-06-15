<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovie;
use App\Http\Resources\api\MovieResource;
use App\Models\genre;
use App\Models\Movie;
use App\Models\rating;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        return MovieResource::collection(Movie::all());
    }

   public function show(Movie $movie) {
    $averageRating = Rating::selectRaw('AVG(rating) as average_rating')
        ->join('movies', 'ratings.movie_id', '=', 'movies.id')
        ->where('ratings.movie_id', $movie->id)
        ->groupBy('ratings.movie_id')
        ->first();

        $genres = Genre::selectRaw('genres.genre')
        ->join('movie_genre', 'genres.id', '=', 'movie_genre.genre_id')
        ->join('movies', 'movie_genre.movie_id', '=', 'movies.id')
        ->where('movies.id', $movie->id)
        ->groupBy('genres.genre')
        ->get();

        $csrfToken = csrf_token();

    
    return new MovieResource(['data' => $movie, 'rating' => $averageRating, 'genres' => $genres, 'csrfToken' => $csrfToken ]);
    }


    public function store(StoreMovie $request){
        $request->validated();
        Movie::create([
            'title' => $request->title,
            'backdrop_path' => $request->backdrop_path,
            'tending' => $request->trending,
            'poster_path' => $request->poster_path,
            'length' => $request->length,
            'date' => $request->date,
            'description' => $request->description,
            'trailer' => "",
            'thumbnail' => "",
            'website_url' => "",
            'website_name' => ""
        ]);
        return response()->json('Movie Created!');
    }

    public function showTrending(){
        return response()->json('ss');

    }

    public function destroy(Movie $movie){
        $movie->delete();
        return response()->json("Movie Deleted!");
    }


}
