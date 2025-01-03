<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MoviesSeeder extends Seeder
{
    public function run()
    {
        $genreAction = DB::table('genres')->where('name', 'Action')->value('id');
        $genreComedy = DB::table('genres')->where('name', 'Comedy')->value('id');
        $genreDrama = DB::table('genres')->where('name', 'Drama')->value('id');

        DB::table('movies')->insert([
            [
                'id' => Str::uuid(),
                'title' => 'The Great Adventure',
                'synopsis' => 'An epic journey of a group of adventurers.',
                'poster' => 'images/The_Great_Adventure.jpg',
                'year' => '2023',
                'available' => true,
                'genre_id' => $genreAction,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Comedy Nights',
                'synopsis' => 'A hilarious comedy about unexpected events.',
                'poster' => 'images/Comedy_Nights.jpg',
                'year' => '2022',
                'available' => true,
                'genre_id' => $genreComedy,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
