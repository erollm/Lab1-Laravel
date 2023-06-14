<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\movie;
use App\Models\User;


class Watchlist extends Model
{
    protected $table = 'watchlist';
    protected $fillable = ['movie_id', 'user_id', 'watched_status', 'bookmarked','watch_later'];




    public function users(){
        return $this->belongsToMany(User::class, 'users' , 'user_id');
    }
    public function movies(){
        return $this->belongsToMany(movie::class);
    }


    use HasFactory;
}
