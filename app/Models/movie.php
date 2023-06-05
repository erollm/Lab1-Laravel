<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\rating;
use App\Models\User;
use App\Models\genre;


class movie extends Model
{
    protected $table = 'movies';

    public function ratings(){
        return $this->hasMany(rating::class, 'movie_id');
    }


    public function users(){
        return $this->belongsToMany(User::class, 'watchlist', 'movie_id', 'user_id');
    }
    public function actors(){
        return $this->belongsToMany(actor::class, 'movie_actor', 'movie_id', 'actor_id');
    }
    public function genres(){
        return $this->belongsToMany(genre::class, 'movie_genre', 'movie_id', 'genre_id');
    }

    protected $fillable = ['title','trending', 'backdoor_path', 'poster_path', 'length', 'date', 'description', 'trailer', 'website_name', 'website_url'];

    use HasFactory;
}
