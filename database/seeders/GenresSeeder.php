<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GenresSeeder extends Seeder
{
    public function run()
    {
        DB::table('genres')->insert([
            ['id' => Str::uuid(), 'name' => 'Action', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'name' => 'Comedy', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'name' => 'Drama', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
