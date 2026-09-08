<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Address;
use App\Models\Category;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Activity>
 */
class ActivityFactory extends Factory
{
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::pluck("id")->toArray();
        $clients = Client::pluck("id")->toArray();
        $categories = Category::pluck("id")->toArray();
        $addresses = Address::pluck("id")->toArray();

        return [
            'type' => $this->faker->randomElement(['meeting', 'call', 'follow_up', 'visit']),
            'description' => $this->faker->paragraph(),
            'category_id' => $this->faker->randomElement($categories),
            'address_id' => $this->faker->randomElement($addresses),
            'user_id' => $this->faker->randomElement($users),
            'client_id' => $this->faker->randomElement($clients),
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed']),
            'start_date' => $this->faker->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d'),
        ];
    }
}
