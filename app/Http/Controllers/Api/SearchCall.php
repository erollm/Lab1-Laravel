<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchCall extends Controller
{
    public function __invoke($query){
        return response()->json('hello');
    }
}
