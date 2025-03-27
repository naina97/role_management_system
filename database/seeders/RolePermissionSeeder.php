<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = Role::create(['name' => 'Super Admin']);
        $companyAdmin = Role::create(['name' => 'Company Admin']);
        $employee = Role::create(['name' => 'Employee']);

        $permissions = ['manage-company', 'manage-users', 'assign-roles', 'view-reports'];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $superAdmin->givePermissionTo(Permission::all());
        $companyAdmin->givePermissionTo(['manage-users', 'assign-roles', 'view-reports']);
        $employee->givePermissionTo(['view-reports']);
    }
}
