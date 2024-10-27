<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesAndPermissionsSeeder::class);
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ])->assignRole(User::ROLE_SUPER_ADMIN);

        User::factory()->create([
            'name' => 'Student User',
            'email' => 'student@example.com',
        ])->assignRole(User::ROLE_STUDENT);

        User::factory()->create([
            'name' => 'Teacher User',
            'email' => 'teacher@example.com'
        ])->assignRole(User::ROLE_TEACHER);

        User::factory()->create([
            'name' => 'Administrative User',
            'email' => 'administrative@example.com'
        ])->assignRole(User::ROLE_ADMINISTRATIVE);
    }
}
