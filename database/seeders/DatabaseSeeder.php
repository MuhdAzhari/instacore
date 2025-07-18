<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // Call other seeders
        $this->call([
            RoleSeeder::class,
            SettingsSeeder::class,
        ]);

        // Create a default admin user
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@instacore.test',
            'password' => bcrypt('password'),
            'is_active' => true,
        ])->assignRole('admin');
    }
}
