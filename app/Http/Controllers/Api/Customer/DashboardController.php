<?php

namespace App\Http\Controllers\Api\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Customer\BoatResource;
use App\Http\Resources\Customer\VehicleResource;
use App\Models\GateEvent;
use App\Models\Tide;
use Illuminate\Database\Eloquent\Builder;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $boat = $request->user()
            ->boats()
            ->with([
                'berthContracts.berth',
                'berthContracts.boat',
                'marina.keys' => fn ($query) => $query->where('user_id' , $request->user()->id),
                // 'marina.boatYard',
                // 'marina.gates.gateEvents'
            ])
            ->limit(1)
            ->first();

        $gateEvents = GateEvent::with('gate')
            ->whereHas('gate.marina', fn (Builder $builder) => $builder->where('id', $boat->marina->id))
            ->whereDate('happens_at', '>', now())
            ->orderBy('happens_at')
            ->limit(4)
            ->get()
            ->map(function(GateEvent $gateEvent) {
                return [
                    'id' => $gateEvent->id,
                    'event_type' => 'gate',
                    'date' => $gateEvent->happens_at,
                    'event_name' => $gateEvent->label,
                    'gate' => [
                        'id' => $gateEvent->gate->id,
                        'name' => $gateEvent->gate->name,
                        'location' => $gateEvent->gate->location,
                    ],
                ];
            });

        $tideEvents = $boat->marina->tides()
            ->whereDate('happens_at', '>', now())
            ->orderBy('happens_at')
            ->limit(4)
            ->get()
            ->map(function(Tide $tide) {
                return [
                    'id' => $tide->id,
                    'event_type' => 'tide',
                    'date' => $tide->happens_at,
                    'event_name' => strtolower($tide->type),
                    'height_in_cm' => $tide->height,
                    'gate' => null,
                ];
            });

        return [
            'boat' => BoatResource::make($boat),
            'vehicles' => VehicleResource::collection(
                $request->user()->vehicles()->limit(2)->get()
            ),
            'upcoming_marina_events' => collect($gateEvents)
                ->merge($tideEvents)
                ->sortBy('date')
                ->values(),
        ];
    }
}
