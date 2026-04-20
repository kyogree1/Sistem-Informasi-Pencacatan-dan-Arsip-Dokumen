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
            'personal_number' => 'ADM001',
            'email' => 'admin@arsip.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // User biasa
        User::create([
            'name' => 'User Arsip',
            'personal_number' => 'PGW001',
            'email' => 'pegawai@arsip.test',
            'password' => Hash::make('password'),
            'role' => 'pegawai',
        ]);

        // Seed arsip contoh (dashboard)
        $this->call(ArchiveSeeder::class);
    }
}
