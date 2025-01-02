<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cast_movies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('movie_id')->nullable();
            $table->uuid('cast_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cast_movies');
    }
};
