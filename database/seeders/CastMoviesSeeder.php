<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CastMoviesSeeder extends Seeder
{
    public function run()
    {
        $castJohn = DB::table('casts')->where('name', 'John Actor')->value('id');
        $castJane = DB::table('casts')->where('name', 'Jane Actress')->value('id');

        $movieTheGreatAdventure = DB::table('movies')->where('title', 'The Great Adventure')->value('id');
        $movieComedyNights = DB::table('movies')->where('title', 'Comedy Nights')->value('id');

        DB::table('cast_movies')->insert([
            [
                'id' => Str::uuid(),
                'movie_id' => $movieComedyNights,
                'cast_id' => $castJohn,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'movie_id' => $movieTheGreatAdventure,
                'cast_id' => $castJane,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
