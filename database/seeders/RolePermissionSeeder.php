<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['SuperAdmin', 'SchoolAdmin', 'Teacher', 'Student', 'Parent', 'Bursar'];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        $permissions = [
            'register schools',
            'monitor stats',
            'generate reports',
            'manage school operations',
            'assign teachers',
            'oversee grading',
            'manage subjects',
            'mark attendance',
            'upload grades',
            'view results',
            'view timetable',
            'view announcements',
            'monitor child progress',
            'view payments',
            'make payments',
            'manage invoices',
            'manage receipts',
            'manage debtors',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        Role::findByName('SuperAdmin')->givePermissionTo(['register schools', 'monitor stats', 'generate reports']);
        Role::findByName('SchoolAdmin')->givePermissionTo(['manage school operations', 'assign teachers', 'oversee grading']);
        Role::findByName('Teacher')->givePermissionTo(['manage subjects', 'mark attendance', 'upload grades']);
        Role::findByName('Student')->givePermissionTo(['view results', 'view timetable', 'view announcements']);
        Role::findByName('Parent')->givePermissionTo(['monitor child progress', 'view payments', 'make payments']);
        Role::findByName('Bursar')->givePermissionTo(['manage invoices', 'manage receipts', 'manage debtors']);

    }
}
