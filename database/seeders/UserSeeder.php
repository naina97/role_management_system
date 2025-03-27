<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Company;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles if they don't exist
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin']);
        $companyAdminRole = Role::firstOrCreate(['name' => 'Company Admin']);
        $employeeRole = Role::firstOrCreate(['name' => 'Employee']);

        // Create Super Admin User
        $superAdmin = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'first_name' => 'Super Admin',
            'password' => Hash::make('password'),
            'company_id' => null, // Super Admin has no company
        ]);
        $superAdmin->assignRole($superAdminRole);

        // Create Company Admin User
        $companyAdmin = User::firstOrCreate([
            'email' => 'companyadmin@example.com',
        ], [
            'first_name' => 'Company Admin',
            'password' => Hash::make('password'),
            'company_id' => 1,
        ]);
        $companyAdmin->assignRole($companyAdminRole);

        // Create Employee User
        $employee = User::firstOrCreate([
            'email' => 'employee@example.com',
        ], [
            'first_name' => 'Employee',
            'password' => Hash::make('password'),
            'company_id' => 2,
        ]);
        $employee->assignRole($employeeRole);
    }

}
