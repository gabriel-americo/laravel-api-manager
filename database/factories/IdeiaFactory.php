<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ideia>
 */
class IdeiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'descricao' => $this->faker->sentence,
            'data_inicio' => $this->faker->dateTimeBetween('-3 months', 'now')->format('Y-m-d'),
            'data_entrega' => $this->faker->dateTimeBetween('now', '+3 months')->format('Y-m-d'),
            'data_lancamento' => $this->faker->dateTimeBetween('+4 months', '+1 year')->format('Y-m-d'),
            'criador' => $this->faker->name,
            'status' => $this->faker->randomElement([0, 1, 2]),
        ];
    }
}
