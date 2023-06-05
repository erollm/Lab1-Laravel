<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovie;
use App\Http\Resources\api\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        return MovieResource::collection(Movie::all());
    }

    public function show(Movie $movie){
        return new MovieResource($movie);
    }

    public function store(StoreMovie $request){
        Movie::create($request->validated());
        return response()->json('Movie Created!');
    }

    public function showTrending(){
        return response()->json('ss');

    }


}
