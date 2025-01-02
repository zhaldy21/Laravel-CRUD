<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CastMovieFactory extends Factory
{
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'movie_id' => $this->faker->numberBetween(1, 2),
            'cast_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
