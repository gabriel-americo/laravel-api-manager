<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\EnderecoCobranca;
use App\Models\EnderecoEnvio;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UsuarioRoleSeeder::class);

        Cliente::factory()
           ->has(EnderecoCobranca::factory())
           ->has(EnderecoEnvio::factory())
           ->count(10)
           ->create();
    }
}
