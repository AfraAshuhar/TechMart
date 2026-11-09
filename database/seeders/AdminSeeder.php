<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@techmart.test'],
            [
                'name' => 'TechMart Admin',
                'password' => Hash::make('password123'), // change to a strong password
            ]
        );
    }
}
