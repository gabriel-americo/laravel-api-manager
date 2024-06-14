<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        // Cria as roles
        $adminRole = Role::insertGetId([
            'name' => 'Admin',
            'description' => 'admin',
        ]);

        $userRole = Role::insertGetId([
            'name' => 'User',
            'description' => 'user',
        ]);

        // Cria os usuários
        $admin = User::insertGetId([
            'name' => 'Admin',
            'user' => 'admin',
            'email' => 'admin@example.com',
            'sex' => 'Masculino',
            'image' => 'assets\media\avatars\blank.png',
            'password' => Hash::make('123456'),
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $user = User::insertGetId([
            'name' => 'User',
            'user' => 'user',
            'email' => 'user@example.com',
            'sex' => 'Feminino',
            'image' => 'assets\media\avatars\blank.png',
            'password' => Hash::make('123456'),
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Associa as roles aos usuários
        DB::table('role_user')->insert([
            'user_id' => $admin,
            'role_id' => $adminRole
        ]);

        DB::table('role_user')->insert([
            'user_id' => $user,
            'role_id' => $userRole
        ]);
    }
}
