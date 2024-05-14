<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */


//     private $permissions = [
//        'role-list',
//        'role-create',
//        'role-edit',
//        'role-delete',
//        'product-list',
//        'product-create',
//        'product-edit',
//        'product-delete'
//    ];

    public function run(): void
    {
//         $this->call(PermissionTableSeeder::class);
//         $this->call(CreateAdminUserSeeder::class);
        // create permissions
        Permission::create(['name' => 'edit employee']);
        Permission::create(['name' => 'delete employee']);
        Permission::create(['name' => 'publish employee']);
        Permission::create(['name' => 'unpublish employee']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('edit employee');
        $role1->givePermissionTo('delete employee');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('publish employee');
        $role2->givePermissionTo('unpublish employee');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user =  Admin::create([
            'name' => 'Example User',
            'email' => 'test@app.com',
            'password' => bcrypt(123456),
            'roles_name'=> "['writer']"
        ]);
        $user->assignRole($role1);

        $user =  Admin::create([
            'name' => 'Example Admin User',
            'email' => 'admin@app.com',
            'password' => bcrypt(123456),
            'roles_name'=> "['admin']"
        ]);
        $user->assignRole($role2);

        $user = Admin::create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@app.com',
            'password' => bcrypt(123456),
            'roles_name'=> "['Super-Admin']"
        ]);
        $user->assignRole($role3);


    }

    }

