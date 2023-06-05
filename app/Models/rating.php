<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\movie;
use App\Models\User;



class rating extends Model{
    protected $table = 'ratings';
    
        public function movie(){
            return $this->belongsTo(movie::class, 'movie_id');
        }
    
        public function user(){
            return $this->belongsTo(user::class, 'user_id');
        }
    
    use HasFactory;
}
