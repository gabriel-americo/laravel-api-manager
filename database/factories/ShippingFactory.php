<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShippingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name_shippings' => $this->faker->firstName,
            'last_name_shippings' => $this->faker->lastName,
            'company_shippings' => $this->faker->company,
            'street_shippings' => $this->faker->streetAddress,
            'number_shippings' => $this->faker->buildingNumber,
            'complement_shippings' => $this->faker->secondaryAddress,
            'district_shippings' => $this->faker->citySuffix,
            'city_shippings' => $this->faker->city,
            'zip_shippings' => $this->faker->postcode,
            'country_shippings' => $this->faker->country,
            'estate_shippings' => $this->faker->state,
            'customer_id' => function () {
                return Customer::factory()->create()->id;
            },
        ];
    }
}
