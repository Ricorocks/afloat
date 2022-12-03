<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Berth;
use App\Models\BerthContract;
use App\Models\Boat;
use App\Models\BoatYard;
use App\Models\Gate;
use App\Models\GateEvent;
use App\Models\Key;
use App\Models\Marina;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
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

        // Make some background Marinas

        Marina::factory()
            ->has(Berth::factory()->count(20))
            ->count(3)
            ->create();


        // Create our demo marina
        // Add a gate
        // Add some gate events

        $marina = Marina::factory()
            ->has(Berth::factory()->count(20))
            ->has(BoatYard::factory())
            ->has(Gate::factory()->has(
                GateEvent::factory()
                    ->count(10)
                    ->state(new Sequence(
                        fn ($sequence) => [
                            'label' => $sequence->index  % 2 == 0 ? 'lowered' : 'raised',
                            'happens_at' => now()->addHour(($sequence->index*6))
                            ]
                    ))
                ))
            ->create([
                'name' => 'Demo Marina'
            ]);


        // Add some tides

        // Create a user
        // "Buy them a boat"
        // "Buy them a truuuuuuck to pull it" - Enough Chris Janson please!
        $user = User::factory()
            ->has(Boat::factory()->for($marina))
            ->has(Vehicle::factory()->count(2))
            ->create();

        // Add a key to the marina and the user

        Key::factory()->for($user)->for($marina)->count(2)->create();

        // Attach the boat to the berth via a berthing

        BerthContract::factory()->create([
            'berth_id' => $marina->berths->first(),
            'user_id' => $user,
            'boat_id' => $user->boats->first(),
        ]);



        // Add an invoice or two
        // oooh
    }
}
