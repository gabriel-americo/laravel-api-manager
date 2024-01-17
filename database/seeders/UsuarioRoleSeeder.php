<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioRoleSeeder extends Seeder
{
    public function run(): void
    {
        // Limpa as tabelas (Usar se necessario)
        //DB::table('roles_usuarios')->truncate();
        //DB::table('usuarios')->truncate();
        //DB::table('roles')->truncate();

        // Cria as roles
        $adminRole = DB::table('roles')->insertGetId([
            'nome' => 'Admin',
            'descricao' => 'admin'
        ]);

        $userRole = DB::table('roles')->insertGetId([
            'nome' => 'User',
            'descricao' => 'user'
        ]);

        // Cria os usuários
        $admin = DB::table('usuarios')->insertGetId([
            'nome' => 'Admin',
            'user' => 'admin',
            'email' => 'admin@example.com',
            'sexo' => 'Masculino',
            'imagem' => '',
            'password' => Hash::make('123456'),
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $user = DB::table('usuarios')->insertGetId([
            'nome' => 'User',
            'user' => 'user',
            'email' => 'user@example.com',
            'sexo' => 'Feminino',
            'imagem' => '',
            'password' => Hash::make('123456'),
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Associa as roles aos usuários
        DB::table('role_usuario')->insert([
            'usuario_id' => $admin,
            'role_id' => $adminRole
        ]);

        DB::table('role_usuario')->insert([
            'usuario_id' => $user,
            'role_id' => $userRole
        ]);
    }
}
