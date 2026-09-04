<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Enterprise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Enterprise>
 */
class EnterpriseFactory extends Factory
{
    protected $model = Enterprise::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $addressesIDs = Address::pluck("id")->toArray();

        return [
            "name" => $this->faker->company(),
            "observations" => $this->faker->sentence(),
            "NIF" => $this->faker->randomNumber(9),
            "web_url" => $this->faker->url(),
            "address_id" => $this->faker->randomElement($addressesIDs)
        ];
    }
}
