<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProfileFactory extends Factory
{
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'biodata' => $this->faker->paragraph,
            'age' => $this->faker->numberBetween(18, 60),
            'address' => $this->faker->address,
            'avatar' => $this->faker->imageUrl(100, 100, 'avatar'),
            'user_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
