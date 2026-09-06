<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Client;
use App\Models\ClientNote;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ClientNote>
 */
class ClientNoteFactory extends Factory
{
    protected $model = ClientNote::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $clientsIDs = Client::pluck("id")->toArray();
        $categoriesIDs = Category::pluck("id")->toArray();

        return [
            "note" => $this->faker->sentence(100),
            "client_id" => $this->faker->randomElement($clientsIDs),
            "category_id" => $this->faker->randomElement($categoriesIDs),
        ];
    }
}
