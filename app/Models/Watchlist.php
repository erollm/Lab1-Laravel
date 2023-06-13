<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    protected $table = 'watchlist';
    protected $fillable = ['movie_id', 'user_id', 'watched_status', 'bookmarked','watch_later'];




    public function users(){
        return $this->belongsToMany(User::class, 'watchlist_user' , 'user_id', 'watchlist_id');
    }
    public function movies(){
        return $this->belongsToMany(movie::class, 'watchlist_movies' , 'movie_id', 'watchlist_id');
    }


    use HasFactory;
}
