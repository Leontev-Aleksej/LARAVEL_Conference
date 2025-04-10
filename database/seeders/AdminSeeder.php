<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'tel' => '123456789',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin1234'),
            'role' => 'admin',
        ]);
    }
}
