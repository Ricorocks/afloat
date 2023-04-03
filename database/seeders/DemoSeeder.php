<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Berth;
use App\Models\BerthContract;
use App\Models\Boat;
use App\Models\BoatYard;
use App\Models\BoatYardService;
use App\Models\Gate;
use App\Models\GateEvent;
use App\Models\Key;
use App\Models\Marina;
use App\Models\MarinaStaff;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            ->has(Berth::factory()->count(10)->state(new Sequence(
                fn($sequence) => [
                    'overlay_x' => 10,
                    'overlay_y' => 20,
                    'overlay_rotate' => 0
                ]
            )))
            ->has(Gate::factory())
            ->count(3)
            ->create();


            MarinaStaff::factory([
                'email' => 'hello@ricorocks.agency',
                'password' => Hash::make('password'),
                'name' => 'John Doe',
                'current_marina' => Marina::all()->first(),
            ])->create();
            
        // Create our demo marina
        // Add a gate
        // Add some gate events
        $date = now()->subDay(2);

        $marina = Marina::factory()
            ->has($boatyard = BoatYard::factory()->has(BoatYardService::factory(2)))
            ->has(Gate::factory()->has(
                GateEvent::factory()
                    ->count(10)
                    ->state(new Sequence(
                        fn ($sequence) => [
                            'label' => $sequence->index  % 2 == 0 ? 'lowered' : 'raised',
                            'happens_at' => $date->clone()->addHour(($sequence->index*6))
                            ]
                    ))
                ))
            ->create([
                'name' => 'Demo Marina'
            ]);
        
        MarinaStaff::factory([
            'email' => 'richard@ricorocks.agency',
            'password' => Hash::make('password'),
            'name' => 'Richard Plant',
            'current_marina' => $marina,
        ])->create();

        Berth::factory()->for($marina)->create([
            'overlay_x' => 24,
            'overlay_y' => 37,
            'overlay_rotate' => 0,
            'leg' => 'A',
            'berth_number' => 10
        ]);
        Berth::factory()->for($marina)->create([
            'overlay_x' => 24,
            'overlay_y' => 43,
            'overlay_rotate' => 0,
            'leg' => 'A',
            'berth_number' => 9
        ]);
        Berth::factory()->for($marina)->create([
            'overlay_x' => 29,
            'overlay_y' => 37,
            'overlay_rotate' => 180,
            'leg' => 'A',
            'berth_number' => 12
        ]);
        Berth::factory()->for($marina)->create([
            'overlay_x' => 49,
            'overlay_y' => 24,
            'overlay_rotate' => 85,
            'leg' => 'B',
            'berth_number' => 25
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
