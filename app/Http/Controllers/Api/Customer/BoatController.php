<?php

namespace App\Http\Controllers\Api\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Customer\BoatResource;

class BoatController extends Controller
{
    public function index(Request $request)
    {
        $boats = $request->user()->boats()->with([
            'marina.gates',
            'marina.keys' => fn ($query) => $query->where('user_id', $request->user()->id)
        ])
        ->get();
        return BoatResource::collection($boats);
    }
}
