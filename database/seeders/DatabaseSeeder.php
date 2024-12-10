<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesAndPermissionsSeeder::class);

        /*User::factory(20)->create([
            'email' => fn() => 'U' . fake()->unique()->randomNumber(8, true) . User::DOMAIN_UTP,
        ])->has(Vehicle::factory()->count(3))->each(function ($user) {
            $user->assignRole(User::ROLE_STUDENT);
        });*/

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ])->assignRole(User::ROLE_SUPER_ADMIN);

        User::factory()->create([
            'name' => 'Jose Huancilla',
            'email' => 'u23222220' . User::DOMAIN_UTP,
        ])->assignRole(User::ROLE_STUDENT);

        User::factory()->create([
            'name' => 'Ana Soto',
            'email' => 'u785241256@example.utp.ed.pe',
        ])->assignRole(User::ROLE_STUDENT);

        User::factory()->create([
            'name' => 'Martin Lozada',
            'email' => 'c526654150@example.utp.edu.pe',
        ])->assignRole(User::ROLE_TEACHER);

        User::factory()->create([
            'name' => 'Carlos Loayza',
            'email' => 'v458745210@example.utp.edu.pe',
        ])->assignRole(User::ROLE_VIGILANT);

        User::factory()->create([
            'name' => 'Administrative User',
            'email' => 'administrative@example.com'
        ])->assignRole(User::ROLE_ADMINISTRATIVE);

        $this->call(GenerateParkingSites::class);
    }
}
