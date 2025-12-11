<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin user
        User::create([
            'name' => 'Admin Toko',
            'email' => 'admin@toko.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now()
        ]);

        // Customer user
        User::create([
            'name' => 'Customer Test',
            'email' => 'customer@toko.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now()
        ]);
    }
}