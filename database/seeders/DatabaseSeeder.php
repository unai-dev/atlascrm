<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\City;
use App\Models\Client;
use App\Models\Country;
use App\Models\Enterprise;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();
        Country::factory(20)->create();
        City::factory(100)->create();
        Address::factory(10)->create();
        Client::factory(10)->create();
        Enterprise::factory(10)->create();
    }
}
