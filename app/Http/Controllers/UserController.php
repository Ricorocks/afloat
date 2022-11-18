<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function dashboard()
    {
        // This is demo
        $user = User::first();
        $activeBoat = User::first()->boats->first();
        $marina = $activeBoat->marina;
        return view('user.dashboard', [
            'user' => $user, 
            'activeBoat' => $activeBoat,
            'marina' => $marina
        ]);
    }
}
