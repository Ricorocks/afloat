<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory([
            'email' => 'richard@ricorocks.agency',
            'password' => Hash::make('password'),
            'name' => 'Richard Plant',
        ])->create();

        Admin::factory([
            'email' => 'eluert@ricorocks.agency',
            'password' => Hash::make('password'),
            'name' => 'Eluert Mukja',
        ])->create();
    }
}
