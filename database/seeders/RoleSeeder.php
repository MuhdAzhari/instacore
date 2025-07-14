<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $viewDashboard = Permission::firstOrCreate(['name' => 'view dashboard']);
        $manageUsers = Permission::firstOrCreate(['name' => 'manage users']);
        $manageRoles = Permission::firstOrCreate(['name' => 'manage roles']);

        // Create roles and assign permissions
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->givePermissionTo([$viewDashboard, $manageUsers, $manageRoles]);

        $user = Role::firstOrCreate(['name' => 'user']);
        $user->givePermissionTo([$viewDashboard]);
    }
}
