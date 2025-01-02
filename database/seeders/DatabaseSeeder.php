<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Memanggil beberapa seeder sekaligus
        $this->call([
            RolesSeeder::class,
            UsersSeeder::class,
            ProfilesSeeder::class,
            GenresSeeder::class,
            MoviesSeeder::class,
            CastsSeeder::class,
            CastMoviesSeeder::class,
            ReviewsSeeder::class,
        ]);
    }
}
