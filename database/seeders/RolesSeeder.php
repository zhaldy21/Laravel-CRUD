<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolesSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['id' => Str::uuid(), 'name' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
            ['id' => Str::uuid(), 'name' => 'User', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
