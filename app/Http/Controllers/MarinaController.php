<?php

namespace App\Http\Controllers;

use App\Models\Marina;
use Illuminate\Http\Request;

class MarinaController extends Controller
{
    public function dashboard()
    {
        // This is demo
        $marina = Marina::where('name', 'Demo Marina')->get()->first();
        return view('marina.dashboard', [
            'marina' => $marina
        ]);
    }
}
