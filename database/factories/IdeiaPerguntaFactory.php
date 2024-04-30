<?php

namespace Database\Factories;

use App\Models\Ideia;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IdeiaPergunta>
 */
class IdeiaPerguntaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pergunta' => $this->faker->sentence,
            'resposta' => $this->faker->paragraph,
            'ideia_id' => function () {
                return Ideia::factory()->create()->id;
            },
            'usuario_id' => function () {
                return Usuario::inRandomOrder()->first()->id;
            },
        ];
    }
}
