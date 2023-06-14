<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\movie;

class genre extends Model
{
    protected $table = 'genres';

    public function movies(){
        return $this->belongsToMany(movie::class, 'movie_genre', 'genre_id', 'movie_id');
    }

    protected $fillable = ['genre'];
    use HasFactory;
}
