<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $admin = DB::table('roles')->where('name', 'Admin')->value('id');
        $user = DB::table('roles')->where('name', 'User')->value('id');

        DB::table('users')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'role_id' => $admin,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'role_id' => $user,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
