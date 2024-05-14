<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'users-list',
            'users-create',
            'users-edit',
            'users-delete',
            'dashboard',
            'attendance',
            'settings',
            'categories-list',
            'categories-create',
            'categories-edit',
            'categories-delete',
            'employee-list',
            'employee-create',
            'employee-edit',
            'employee-delete',
            'bank-list',
            'bank-create',
            'bank-edit',
            'bank-delete',
            'reports'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
