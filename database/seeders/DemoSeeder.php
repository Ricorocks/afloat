<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Boat;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create an admin
        Admin::factory()->create();

        // Create a user
        $user = User::factory()->create();

        // "Buy them a boat"
        Boat::factory()->for($user);

        // "Buy them a truuuuuuck to pull it" - Enought Chris Janson please!

        // Make a Marina

        // Add a gate

        // Add some gate events

        // Add a berth

        // Add some tides

        // Add a key to the marina and the user

        // Attach the boat to the berth via a berthing

        // Add an invoice

    }
}
