<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovie;
use App\Http\Resources\api\MovieResource;
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

    return new MovieResource(['data' => $movie, 'rating' => $averageRating]);
}


    public function store(StoreMovie $request){
        Movie::create($request->validated());
        return response()->json('Movie Created!');
    }

    public function showTrending(){
        return response()->json('ss');

    }


}
