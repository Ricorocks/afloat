<?php

namespace App\Http\Controllers;

use App\Models\Gate;
use App\Models\Marina;
use Illuminate\Http\Request;

class GateController extends Controller
{
    public function index(Marina $marina)
    {
        // This is demo
        return view('marina.gates.index', [
            'marina' => $marina
        ]);
    }

    public function show(Marina $marina, Gate $gate)
    {
        // This is demo
        return view('marina.gates.show', [
            'marina' => $marina,
            'gate' => $gate,
            'gateEvents' => $gate->gateEvents()->orderBy('happens_at', 'desc')->get(),
        ]);
    }
}
