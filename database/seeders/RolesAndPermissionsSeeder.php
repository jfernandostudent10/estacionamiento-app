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
        $roleAdministrative = Role::UpdateOrCreate(['name' => User::ROLE_ADMINISTRATIVE], ['name' => User::ROLE_ADMINISTRATIVE]);
        $roleTeacher = Role::UpdateOrCreate(['name' => User::ROLE_TEACHER], ['name' => User::ROLE_TEACHER]);
        $roleSStudent = Role::UpdateOrCreate(['name' => User::ROLE_STUDENT], ['name' => User::ROLE_STUDENT]);
        $roleVigilant = Role::UpdateOrCreate(['name' => User::ROLE_VIGILANT], ['name' => User::ROLE_VIGILANT]);

        Permission::UpdateOrCreate(['name' => 'dashboard'], ['name' => 'dashboard'])->syncRoles([$roleTeacher, $roleSStudent]);
        Permission::UpdateOrCreate(['name' => 'vehicles.index'], ['name' => 'vehicles.index'])->syncRoles([$roleTeacher, $roleSStudent]);
        Permission::UpdateOrCreate(['name' => 'vehicles.create'], ['name' => 'vehicles.create'])->syncRoles([$roleTeacher, $roleSStudent]);
        Permission::UpdateOrCreate(['name' => 'vehicles.edit'], ['name' => 'vehicles.edit'])->syncRoles([$roleTeacher, $roleSStudent]);
        Permission::UpdateOrCreate(['name' => 'vehicles.edit'], ['name' => 'vehicles.edit'])->syncRoles([$roleTeacher, $roleSStudent]);
        Permission::UpdateOrCreate(['name' => 'vehicles.destroy'], ['name' => 'vehicles.destroy'])->syncRoles([$roleTeacher, $roleSStudent]);
        //
        Permission::UpdateOrCreate(['name' => 'approve-vehicles.index'], ['name' => 'approve-vehicles.index'])->syncRoles([$roleAdministrative]);
    }
}
