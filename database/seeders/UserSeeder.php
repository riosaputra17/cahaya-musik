<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin Account
        User::create([
            'user_id' => Str::uuid(),
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            'created_at' => now(),
        ]);

        // Regular User Account
        User::create([
            'user_id' => Str::uuid(),
            'username' => 'riobadrun',
            'email' => 'riobadrun1721@gmail.com',
            'password' => Hash::make('user'),
            'role' => 'user',
            'created_at' => now(),
        ]);
    }
}
