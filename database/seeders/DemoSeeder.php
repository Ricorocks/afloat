<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Berth;
use App\Models\BerthBooking;
use App\Models\BerthBookingRate;
use App\Models\BerthContract;
use App\Models\Boat;
use App\Models\BoatYard;
use App\Models\BoatYardService;
use App\Models\Gate;
use App\Models\GateEvent;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Key;
use App\Models\Marina;
use App\Models\MarinaStaff;
use App\Models\Tide;
use App\Models\User;
use App\Models\Vehicle;
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

        MarinaStaff::factory([
            'email' => 'eluert@ricorocks.agency',
            'password' => Hash::make('password'),
            'name' => 'Eluert Mukja',
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

        Tide::factory(4)
            ->sequence(
                ['tide_at' => now(), 'height' => '100', 'type' => 'LOW'],
                ['tide_at' => now()->addHours(6), 'height' => '800', 'type' => 'HIGH'],
                ['tide_at' => now()->addHours(12), 'height' => '120', 'type' => 'LOW'],
                ['tide_at' => now()->addHours(18), 'height' => '810', 'type' => 'HIGH'],
                ['tide_at' => now()->addHours(23), 'height' => '113', 'type' => 'LOW'],
                ['tide_at' => now()->addHours(29), 'height' => '814', 'type' => 'HIGH'],
                ['tide_at' => now()->addHours(34), 'height' => '119', 'type' => 'LOW'],
                ['tide_at' => now()->addHours(40), 'height' => '817', 'type' => 'HIGH'],
                ['tide_at' => now()->addHours(46), 'height' => '103', 'type' => 'LOW'],
            )
            ->for($marina)
            ->create();


        User::factory()
            ->times(count($users = [
                'richard@ricorocks.agency' => 'Richard Plant',
                'eluert@ricorocks.agency' => 'Eluert Mukja',
            ]))
            ->has(Boat::factory()->for($marina))
            ->has(Vehicle::factory()->count(2))
            ->afterCreating(function (User $user) use($marina) {
                Key::factory()->for($user)->for($marina)->count(2)->create();

                // Attach the boat to the berth via a berthing
                BerthContract::factory()->create([
                    'berth_id' => $marina->berths()->inRandomOrder()->first(),
                    'user_id' => $user,
                    'boat_id' => $user->boats()->inRandomOrder()->first(),
                ]);

                // Add an invoice or two
                Invoice::factory()->for($user)->has(InvoiceItem::factory(2))->create();
            })
            ->create(
                new Sequence(
                    ...collect($users)
                           ->map(fn(string $name, string $email) => ['name' => $name, 'email' => $email])
                           ->values()
                )
            );


            // Make a Booking
            $berthToBook = Berth::factory()->for($marina)->create([
                'internal_id' => 'Book Test Berth',
                'leg' => 'A',
                'berth_number' => '12',
            ]);
            
            $berthRateToBook = BerthBookingRate::factory(2)
                ->sequence(
                    ['name' => 'Standard Overnight Rate', 'starts_at' => now()->subMonths(3)],
                    ['name' => 'Late Overnight Rate', 'starts_at' => now()->subMonths(3)]
                )
                ->create();

            $userToBook = User::all()->first();

            $booking = BerthBooking::factory()
                ->for($berthRateToBook->first())
                ->for($berthToBook)
                ->for($userToBook)
                ->for($userToBook->boats->first())
                ->create([
                    'booked_at' => now()->subDays(45),
                    'starts_at' => now()->addDays(15),
                    'ends_at' => now()->addDays(22),
                ]);
    }
}
