<?php

namespace App\Http\Controllers\Api\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\GateEventResource;
use App\Http\Resources\MarinaResource;
use App\Models\GateEvent;
use App\Models\Marina;

class MarinaController extends Controller
{
    public function index(Request $request)
    {
        $marinas = Marina::with(['gates.gateEvents', 'boatYard'])
            ->when($request->has('search') && $request->search !== null, function($query) use($request) {
                $query->where('name', 'like', "%{$request->search}%");
            })
            ->simplePaginate(20)
            ->withQueryString();

        return MarinaResource::collection($marinas);
    }

    public function show(Marina $marina)
    {
        $gateEvents = GateEvent::with('gate')
            ->whereHas('gate.marina', fn ($query) => $query->where('id', $marina->id))
            ->limit(8)
            ->get();

        return response()->json([
            'marina' => MarinaResource::make($marina->load('gates', 'boatYard')),
            'gate_events' => GateEventResource::collection($gateEvents),
        ]);
    }

    public function events(Marina $marina)
    {
        $events = GateEvent::with('gate')
            ->whereHas('gate.marina', fn ($query) => $query->where('id', $marina->id))
            ->latest()
            ->simplePaginate(20)
            ->withQueryString();

        return GateEventResource::collection($events);
    }
}
