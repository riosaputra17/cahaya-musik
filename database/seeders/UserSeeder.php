<?php

namespace Database\Seeders;

use App\Models\Customer;
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

        $userIdCustomer = Str::uuid();
        $emailCustomer = 'riobadrun1721@gmail.com';
        User::create([
            'user_id' => $userIdCustomer,
            'username' => 'riobadrun',
            'email' => $emailCustomer,
            'password' => Hash::make('user'),
            'role' => 'user',
            'created_at' => now(),
        ]);

        Customer::create([
            'customer_id' => Str::uuid(),
            'user_id' => $userIdCustomer,
            'nama' => 'Rio Saputra',
            'email' => $emailCustomer,
            'phone' => '089514121111',
            'alamat' => 'Bekasi',
        ]);
    }
}
