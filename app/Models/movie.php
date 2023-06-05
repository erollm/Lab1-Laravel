<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{


    // $table->string('title')->unique();
    // $table->string('backdoor_path');
    // $table->string('poster_path');
    // $table->time('length');
    // $table->date('date');
    // $table->string('description');
    // $table->string('trailer');
    // $table->string('thumbnail');
    // $table->string('website_name');
    // $table->string('website_url');

    protected $fillable = ['title','trending', 'backdoor_path', 'poster_path', 'length', 'date', 'description', 'trailer', 'website_name', 'website_url'];

    use HasFactory;
}
