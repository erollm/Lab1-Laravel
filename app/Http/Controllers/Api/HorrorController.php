<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\genre;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function __invoke(){
        $genre = genre::where('genre', 'Horror')->first();
        $movies = $genre->movies;

        if($movies->isEmpty()){
            return response()->json('Invalid movie');
        }
        
        return response()->json($movies);
    }
}
