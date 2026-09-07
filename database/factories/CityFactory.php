<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class CityFactory extends Factory
{
    protected $model = City::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $countriesIDs = Country::pluck("id")->toArray();
        return [
            "name" => $this->faker->city(),
            "country_id" => $this->faker->randomElement($countriesIDs)
        ];
    }
}
