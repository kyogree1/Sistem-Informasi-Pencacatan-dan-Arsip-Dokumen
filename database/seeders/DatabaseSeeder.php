<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Admin
        User::create([
            'name' => 'Admin Arsip',
            'email' => 'admin@arsip.test',
            'password' => Hash::make('password'),
        ]);

        // User biasa
        User::create([
            'name' => 'User Arsip',
            'email' => 'user@arsip.test',
            'password' => Hash::make('password'),
        ]);

        // Seed arsip contoh (dashboard)
        $this->call(ArchiveSeeder::class);
    }
}
