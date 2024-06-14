<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Shipping;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserRoleSeeder::class);

        Customer::factory()
            ->has(Address::factory())
            ->has(Shipping::factory())
            ->count(10)
            ->create();
    }
}
