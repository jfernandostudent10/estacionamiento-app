<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::UpdateOrCreate(['name' => User::ROLE_SUPER_ADMIN], ['name' => User::ROLE_SUPER_ADMIN]);
        $roleTeacher = Role::UpdateOrCreate(['name' => User::ROLE_TEACHER], ['name' => User::ROLE_TEACHER]);
        $roleSStudent = Role::UpdateOrCreate(['name' => User::ROLE_STUDENT], ['name' => User::ROLE_STUDENT]);

        Permission::UpdateOrCreate(['name' => 'dashboard'], ['name' => 'dashboard'])->syncRoles([$roleTeacher, $roleSStudent]);
    }
}
