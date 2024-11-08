<?php

namespace Database\Seeders;

use App\Models\Employe;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeding a test user into the `users` table
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => bcrypt('password'), // Adjust if needed
        // ]);

        // Seeding 10 employees into the `employes` table
        for ($i = 0; $i < 10; $i++) {
            Employe::create([
                'username' => 'employe' . $i,
                'email' => 'email' . $i . '@example.com', // Ensure valid email format
                'password' => Hash::make('12345'),
            ]);
        }

        // Seeding roles into the `roles` table
        Role::create(['name' => 'HR']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Smm']);
        Role::create(['name' => 'frontend']);
        Role::create(['name' => 'backend']);
        Role::create(['name' => 'leader']);

        // Attaching random roles to each employee
        for ($i = 0; $i < 10; $i++) {
            $employe = Employe::create([
                'username' => 'user' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => bcrypt('password' . $i),
            ]);

            $row = rand(1, 6);
            for ($j = 0; $j < $row; $j++) {
                $employe->roles()->attach(rand(1, 6));
            }
        }
    }
}
