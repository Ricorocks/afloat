<?php

namespace App\Http\Controllers;

class UserController extends Controller
{

    public function dashboard()
    {
        $activeBoat = auth()->user()->boats->first();
        return view('user.dashboard', [
            'activeBoat' => $activeBoat,
            'marina' => $activeBoat->marina,
        ]);
    }
}
