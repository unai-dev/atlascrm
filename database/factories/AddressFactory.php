<?php

namespace Database\Factories;

use App\Models\Address;
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
        return [
            "main_address" => $this->faker->address(),
            "post_code" => $this->faker->postcode(),
            "country" => $this->faker->country(),
            "autonomous_community" => $this->faker->text(),
            "city" => $this->faker->city()
        ];
    }
}
