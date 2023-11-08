<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@.com',
            'role' => 'admin',
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@.com',
            'role' => 'user',
            'password' => bcrypt('user'),
        ]);
    }
}
