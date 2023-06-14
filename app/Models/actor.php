<?php

namespace App\Models;

use App\Models\movie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actor extends Model
{
    protected $table = 'actors';

    protected $fillable =['first_name','last_name','photo','website'];

    public function movies(){
        return $this->belongsToMany(movie::class, 'movie_actor', 'actor_id', 'movie_id');
    }
    use HasFactory;
}
