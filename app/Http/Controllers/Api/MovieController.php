<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovie;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        return response()->json('Hello');
    }

    public function store(StoreMovie $request){
        Movie::create($request->validated());
        return response()->json('Movie Created!');

    }


}