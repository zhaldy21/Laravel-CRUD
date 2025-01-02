<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CastFactory extends Factory
{
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(18, 60),
            'biodata' => $this->faker->paragraph,
            'avatar' => $this->faker->imageUrl(100, 100, 'actor'),
        ];
    }
}
