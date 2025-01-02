<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfilesSeeder extends Seeder
{
    public function run()
    {
        DB::table('profiles')->insert([
            [
                'id' => Str::uuid(),
                'biodata' => 'This is John Doe\'s profile.',
                'age' => 30,
                'address' => '123 Main Street',
                'avatar' => 'avatar1.png',
                'user_id' => null, // Update with a valid user_id if needed
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'biodata' => 'This is Jane Smith\'s profile.',
                'age' => 25,
                'address' => '456 Elm Street',
                'avatar' => 'avatar2.png',
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
