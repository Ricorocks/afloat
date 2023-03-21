<?php

namespace App\Http\Controllers;

use App\Models\Marina;
use Illuminate\Http\Request;

class BerthController extends Controller
{
    public function manage(Marina $marina)
    {
        return view('marina.berths.manage', [
            'marina' => $marina
        ]);
    }

    public function overview(Marina $marina)
    {
        return view('marina.berths.overview', [
            'marina' => $marina
        ]);
    }
}
