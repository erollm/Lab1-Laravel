<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->enum('trending', [0, 1]);
            $table->string('backdoor_path');
            $table->string('poster_path');
            $table->time('length');
            $table->date('date');
            $table->string('description');
            $table->string('trailer');
            $table->string('thumbnail')->nullable();
            $table->string('website_name');
            $table->string('video_location');
            $table->string('website_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
