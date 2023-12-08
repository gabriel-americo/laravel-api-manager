<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EnderecoEnvios>
 */
class EnderecoEnviosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome_envios' => $this->faker->firstName,
            'sobrenome_envios' => $this->faker->lastName,
            'empresa_envios' => $this->faker->company,
            'rua_envios' => $this->faker->streetName,
            'numero_envios' => $this->faker->buildingNumber,
            'complemento_envios' => $this->faker->secondaryAddress,
            'bairro_envios' => $this->faker->streetSuffix,
            'cidade_envios' => $this->faker->city,
            'cep_envios' => $this->faker->postcode,
            'pais_envios' => $this->faker->country,
            'estado_envios' => $this->faker->state,
        ];
    }
}
