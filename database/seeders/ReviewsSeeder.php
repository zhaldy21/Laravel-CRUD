<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReviewsSeeder extends Seeder
{
    public function run()
    {
        $johnDoe = DB::table('users')->where('name', 'John Doe')->value('id');
        $janeSmith = DB::table('users')->where('name', 'Jane Smith')->value('id');

        $movieTheGreatAdventure = DB::table('movies')->where('title', 'The Great Adventure')->value('id');
        $movieComedyNights = DB::table('movies')->where('title', 'Comedy Nights')->value('id');

        DB::table('reviews')->insert([
            [
                'id' => Str::uuid(),
                'review' => 'Amazing movie with great action sequences!',
                'rating' => 5,
                'user_id' => $janeSmith,
                'movie_id' => $movieTheGreatAdventure,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'review' => 'Funny and entertaining throughout!',
                'rating' => 4,
                'user_id' => $johnDoe,
                'movie_id' => $movieTheGreatAdventure,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
