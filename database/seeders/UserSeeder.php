<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'donor',
            'email' => 'donor@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'donor'
        ]);

        User::create([
            'name' => 'volunteer',
            'email' => 'volunteer@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'volunteer'
        ]);
    }
}
