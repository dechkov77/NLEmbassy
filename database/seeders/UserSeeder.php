<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role_id' => 3, // Assuming an admin role exists with ID 1
                'profile_picture' => 'default.png',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Regular User',
                'email' => 'user@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role_id' => 2, // Assuming a regular user role exists with ID 2
                'profile_picture' => 'default.png',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Regular User',
                'email' => 'user2@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role_id' => 2, // Assuming a regular user role exists with ID 2
                'profile_picture' => 'default.png',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
