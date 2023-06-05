<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\genre;
use App\Models\movie;
use Illuminate\Http\Request;

class GetMovieByGenre extends Controller{
    

    public function __invoke($genre){
        return response()->json('hhh');
    $movies = movie::whereHas('genres', function ($query) use ($genre) {
        $query->where('name', $genre);
    })->get();

    if ($movies->isEmpty()) {
        return response()->json(['message' => 'No movies found for the genre'], 404);
    }

    return response()->json($movies);
}


}
