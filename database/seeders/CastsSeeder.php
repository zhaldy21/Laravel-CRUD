<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CastsSeeder extends Seeder
{
    public function run()
    {
        DB::table('casts')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'John Actor',
                'age' => 35,
                'biodata' => 'A renowned actor known for his action roles.',
                'avatar' => 'john_actor.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Jane Actress',
                'age' => 28,
                'biodata' => 'An upcoming actress in the comedy genre.',
                'avatar' => 'jane_actress.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
