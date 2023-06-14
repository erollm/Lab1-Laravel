<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\genre;
use Illuminate\Http\Request;

class RomanceController extends Controller
{
    public function __invoke(){
        $genre = genre::where('genre', 'Romance')->first();
        $movies = $genre->movies;

        if($movies->isEmpty()){
            return response()->json('Invalid movie');
        }
        
        return response()->json($movies);
    }
}
