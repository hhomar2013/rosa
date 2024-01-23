<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
//        Admin::create([
//            'name'=> 'OmarMahgoub-Admin',
//            'email'=>'admin@app.com',
//            'password'=>bcrypt('123456')
//        ]);
//
//        User::create([
//            'name'=> 'OmarMahgoub-Admin',
//            'email'=>'admin@app.com',
//            'password'=>bcrypt('123456')
//        ]);
        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);




    }
}
