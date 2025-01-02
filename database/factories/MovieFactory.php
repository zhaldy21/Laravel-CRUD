<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MovieFactory extends Factory
{
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'title' => $this->faker->sentence,
            'synopsis' => $this->faker->paragraph,
            'poster' => $this->faker->imageUrl(200, 300, 'movie poster'),
            'year' => $this->faker->year,
            'available' => $this->faker->boolean,
            'genre_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
