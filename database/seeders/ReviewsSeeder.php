<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReviewsSeeder extends Seeder
{
    public function run()
    {
        DB::table('reviews')->insert([
            [
                'id' => Str::uuid(),
                'review' => 'Amazing movie with great action sequences!',
                'rating' => 5,
                'user_id' => null, // Update with a valid user_id if needed
                'movie_id' => null, // Update with a valid movie_id if needed
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'review' => 'Funny and entertaining throughout!',
                'rating' => 4,
                'user_id' => null,
                'movie_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
