<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\movie;
use Illuminate\Http\Request;

class TrendingController extends Controller
{
    public function __invoke(){
        return Movie::where('trending', 1)->get();
    }
}
