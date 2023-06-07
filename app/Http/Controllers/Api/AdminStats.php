<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\movie;
use App\Models\User;
use Illuminate\Http\Request;

class AdminStats extends Controller
{
    function __invoke(){
        $movies = movie::count();
        $users = User::count();

        $data = [
            'movieCount' => $movies,
            'userCount' => $users
        ];

        return response()->json(['data' => $data]);


    }
}
