<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\rating;


class movie extends Model
{
    protected $table = 'movies';

    public function ratings(){
        return $this->hasMany(rating::class, 'movie_id');
    }

    protected $fillable = ['title','trending', 'backdoor_path', 'poster_path', 'length', 'date', 'description', 'trailer', 'website_name', 'website_url'];

    use HasFactory;
}
