<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\movie;
use Illuminate\Http\Request;


class SearchCall extends Controller
{
    public function __invoke($query){
        $response = movie::where('title', 'like', '%' . $query . '%')->get();

        if($response->isEmpty()){
            abort(404, 'No movies');
        }

        return $response;
    }
}
