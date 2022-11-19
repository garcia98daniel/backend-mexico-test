<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $teacher = Role::create(['name' => 'Teacher']);

        Permission::create(['name' => 'view.subjects'])->syncRoles([$admin]);
        Permission::create(['name' => 'view.my-subject'])->syncRoles([$teacher]);
        Permission::create(['name' => 'view.users'])->syncRoles([$admin]);
        Permission::create(['name' => 'view.config'])->syncRoles([$admin, $teacher]);
        

        Permission::create(['name' => 'subjects.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'students.index'])->syncRoles([$admin]);
        
        Permission::create(['name' => 'users.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.delete'])->syncRoles([$admin]);

        Permission::create(['name' => 'config.index'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'config.edit'])->syncRoles([$admin, $teacher]);
        


    }
}
