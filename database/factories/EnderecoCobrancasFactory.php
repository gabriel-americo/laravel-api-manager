<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EnderecoCobrancas>
 */
class EnderecoCobrancasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome_cobrancas' => $this->faker->firstName,
            'sobrenome_cobrancas' => $this->faker->lastName,
            'cpf_cobrancas' => $this->faker->numerify('###########'),
            'cnpj_cobrancas' => $this->faker->numerify('##############'),
            'empresa_cobrancas' => $this->faker->company,
            'nascimento_cobrancas' => $this->faker->date(),
            'sexo_cobrancas' => $this->faker->randomElement(['M', 'F']),
            'rua_cobrancas' => $this->faker->streetAddress,
            'numero_cobrancas' => $this->faker->randomNumber(5),
            'complemento_cobrancas' => $this->faker->word,
            'bairro_cobrancas' => $this->faker->citySuffix,
            'cidade_cobrancas' => $this->faker->city,
            'cep_cobrancas' => $this->faker->postcode,
            'pais_cobrancas' => $this->faker->country,
            'estado_cobrancas' => $this->faker->state,
            'telefone_cobrancas' => $this->faker->phoneNumber,
            'celular_cobrancas' => $this->faker->phoneNumber,
            'email_cobrancas' => $this->faker->unique()->safeEmail,
            'clientes_id' => function () {
                return Cliente::factory()->create()->id;
            },
        ];
    }
}
