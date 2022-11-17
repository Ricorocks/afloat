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
        return view('user.dashboard', ['user' => $user]);
    }
}
