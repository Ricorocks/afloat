<?php

namespace App\Http\Controllers\Api\Customer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $input = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
                'device_name' => 'required',
            ]
        );

        $user = User::where('email', $input['email'])->first();

        throw_unless(
            $user && Hash::check($input['password'], $user->password),
            ValidationException::withMessages(['email' => ['The provided credentials are incorrect.']])
        );

        return $user->createToken($input['device_name'])->plainTextToken;
    }
}
