<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MoviesSeeder extends Seeder
{
    public function run()
    {
        DB::table('movies')->insert([
            [
                'id' => Str::uuid(),
                'title' => 'The Great Adventure',
                'synopsis' => 'An epic journey of a group of adventurers.',
                'poster' => 'adventure.jpg',
                'year' => '2023',
                'available' => true,
                'genre_id' => null, // Update with a valid genre_id if needed
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Comedy Nights',
                'synopsis' => 'A hilarious comedy about unexpected events.',
                'poster' => 'comedy.jpg',
                'year' => '2022',
                'available' => true,
                'genre_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
