<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name_addresses' => $this->faker->firstName,
            'last_name_addresses' => $this->faker->lastName,
            'document_addresses' => $this->faker->randomNumber(),
            'company_addresses' => $this->faker->company,
            'birth_addresses' => $this->faker->date(),
            'sex_addresses' => $this->faker->randomElement(['M', 'F']),
            'street_addresses' => $this->faker->streetAddress,
            'number_addresses' => $this->faker->buildingNumber,
            'complement_addresses' => $this->faker->secondaryAddress,
            'district_addresses' => $this->faker->citySuffix,
            'city_addresses' => $this->faker->city,
            'zip_addresses' => $this->faker->postcode,
            'country_addresses' => $this->faker->country,
            'estate_addresses' => $this->faker->state,
            'phone_addresses' => $this->faker->phoneNumber,
            'cell_addresses' => $this->faker->phoneNumber,
            'email_addresses' => $this->faker->unique()->safeEmail,
            'site_addresses' => $this->faker->url,
            'customer_id' => function () {
                return Customer::factory()->create()->id;
            },
        ];
    }
}
