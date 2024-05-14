<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = Admin::create([
            'name' => 'OmarMahgoub',
            'email' => 'admin@app.com',
            'roles_name' => "['Admin']",
            'password' => bcrypt('123456')
        ]);


        // Create a manager role for users authenticating with the admin guard:
        $role = Role::create(['guard_name'=> 'admin','name' => 'Admin']);

// Define a `publish articles` permission for the admin users belonging to the admin guard
//        $permission = Permission::create(['guard_name' => 'admin', 'name' => 'dashboard']);



//        $role = Role::create(['name' => 'Admin']);

        $permission = Permission::pluck('id','id')->all();

        $role->syncPermissions($permission);

        $user->assignRole([$role->id]);
    }
}
