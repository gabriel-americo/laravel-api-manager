<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class CustomerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'user' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'site' => $this->faker->url,
            'image' => $this->faker->imageUrl(),
            'password' => Hash::make('123456'),
            'status' => $this->faker->randomElement([1, 0]),
        ];
    }
}
