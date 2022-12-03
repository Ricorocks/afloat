<?php

namespace App\Http\Controllers;

use App\Models\Gate;
use App\Models\Marina;
use Illuminate\Http\Request;

class GateEventController extends Controller
{
    public function show(Marina $marina, Gate $gate)
    {
        // This is demo
        return view('marina.gates.events.show', [
            'marina' => $marina,
            'gate' => $gate
        ]);
    }
}
