<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Address>
 */
class AddressFactory extends Factory
{
    protected $model = Address::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $citiesIDs = City::pluck("id")->toArray();
        $countriesIDs = Country::pluck("id")->toArray();
        return [
            "main_address" => $this->faker->address(),
            "post_code" => $this->faker->postcode(),
            "country_id" => $this->faker->randomElement($countriesIDs),
            "city_id" => $this->faker->randomElement($citiesIDs)
        ];
    }
}
