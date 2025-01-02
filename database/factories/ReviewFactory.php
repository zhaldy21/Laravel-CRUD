<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReviewFactory extends Factory
{
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'review' => $this->faker->paragraph,
            'rating' => $this->faker->numberBetween(1, 5),
            'user_id' => $this->faker->numberBetween(1, 2),
            'movie_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
