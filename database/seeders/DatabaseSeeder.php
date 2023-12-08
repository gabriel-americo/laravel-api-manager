<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\EnderecoCobrancas;
use App\Models\EnderecoEnvios;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UsuariosRolesSeeder::class);

        Cliente::factory()
           ->has(EnderecoCobrancas::factory())
           ->has(EnderecoEnvios::factory())
           ->count(10)
           ->create();
    }
}
