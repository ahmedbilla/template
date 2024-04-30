<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make("pasword");

    User::create([
        'name' => "admin",
        'email' => "admin@example.com",
        'email_verified_at' => now(),
        'password' => $password,
        'remember_token' => Str::random(10),
    ])->assignRole('admin');
    }
}
