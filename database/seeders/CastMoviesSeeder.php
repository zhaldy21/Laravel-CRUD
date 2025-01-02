<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CastMoviesSeeder extends Seeder
{
    public function run()
    {
        DB::table('cast_movies')->insert([
            [
                'id' => Str::uuid(),
                'movie_id' => null, // Update with a valid movie_id if needed
                'cast_id' => null, // Update with a valid cast_id if needed
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
