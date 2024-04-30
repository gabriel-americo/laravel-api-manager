<?php

namespace Database\Factories;

use App\Models\Ideia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IdeiaImagem>
 */
class IdeiaImagemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'legenda' => $this->faker->sentence,
            'imagem' => $this->faker->imageUrl(),
            'ideia_id' => function () {
                return Ideia::factory()->create()->id;
            },
        ];
    }
}
