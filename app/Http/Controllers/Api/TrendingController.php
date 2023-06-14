<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\movie;
use Illuminate\Http\Request;

class TrendingController extends Controller
{
    public function __invoke(){
        $response = Movie::where('trending', "1")->get();
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
        $response->header('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept');
    
        return response()->json($response);
    }
}
