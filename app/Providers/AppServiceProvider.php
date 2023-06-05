<?php

namespace App\Providers;

use App\Models\Key;
use App\Models\Boat;
use App\Models\Gate;
use App\Models\Tide;
use App\Models\User;
use App\Models\Admin;
use App\Models\Berth;
use App\Models\Marina;
use App\Models\Address;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Vehicle;
use App\Models\BoatYard;
use App\Models\GateEvent;
use App\Models\InvoiceItem;
use App\Models\MarinaStaff;
use App\Models\BerthBooking;
use App\Models\BerthContract;
use App\Models\BoatYardService;
use App\Models\BerthBookingRate;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();

        Relation::requireMorphMap();
        Relation::enforceMorphMap([
            'address' => Address::class,
            'admin' => Admin::class,
            'berth' => Berth::class,
            'berth-booking' => BerthBooking::class,
            'berth-booking-rate' => BerthBookingRate::class,
            'berth-contract' => BerthContract::class,
            'boat' => Boat::class,
            'boat-yard' => BoatYard::class,
            'boat-yard-service' => BoatYardService::class,
            'gate' => Gate::class,
            'gate-event' => GateEvent::class,
            'invoice' => Invoice::class,
            'invoice-item' => InvoiceItem::class,
            'key' => Key::class,
            'marina' => Marina::class,
            'marina-staff' => MarinaStaff::class,
            'payment' => Payment::class,
            'tide' => Tide::class,
            'user' => User::class,
            'vehicle' => Vehicle::class,
        ]);

        Filament::serving(function () {
            Filament::registerViteTheme('resources/css/filament.css');
        });
    }
}
