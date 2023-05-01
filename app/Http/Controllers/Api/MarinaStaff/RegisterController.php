<?php

namespace App\Http\Controllers\Api\MarinaStaff;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Marina;
use App\Models\MarinaStaff;

class RegisterController extends Controller
{
    use PasswordValidationRules;

    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(MarinaStaff::class),
            ],
            'password' => $this->passwordRules(),
        ]);

        return MarinaStaff::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'current_marina' => Marina::inRandomOrder()->first()->id,
        ]);
    }
}
