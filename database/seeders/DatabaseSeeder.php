<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User_has_subject;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //views
        // $Permission1 = Permission::create(['name' => 'view.subjects'])->syncRoles([$admin]);
        // $Permission2 = Permission::create(['name' => 'view.my-subject'])->syncRoles([$teacher]);
        // $Permission3 = Permission::create(['name' => 'view.users'])->syncRoles([$admin]);
        // $Permission4 = Permission::create(['name' => 'view.config'])->syncRoles([$admin, $teacher]);
        

        // //actions
        // $Permission5 = Permission::create(['name' => 'subjects.index'])->syncRoles([$admin, teacher]);
        // $Permission6 = Permission::create(['name' => 'students.index'])->syncRoles([$admin]);
        
        // $Permission7 = Permission::create(['name' => 'users.index'])->syncRoles([$admin]);
        // $Permission8 = Permission::create(['name' => 'users.create'])->syncRoles([$admin]);
        // $Permission9 = Permission::create(['name' => 'users.delete'])->syncRoles([$admin]);

        // $Permission10 = Permission::create(['name' => 'config.index'])->syncRoles([$admin, $teacher]);
        // $Permission11 = Permission::create(['name' => 'config.edit'])->syncRoles([$admin, $teacher]);

        $admin = Role::create(['name' => 'admin']);
        $teacher = Role::create(['name' => 'teacher']);

        $permission1 = Permission::create(['name' => 'view.subjects']);
        // $permission2 = Permission::create(['name' => 'view.my-subject']);
        $permission3 = Permission::create(['name' => 'view.users']);
        $permission4 = Permission::create(['name' => 'view.config']);
        

        //actions
        $permission5 = Permission::create(['name' => 'subjects.index']);
        $permission6 = Permission::create(['name' => 'students.index']);
        
        $permission7 = Permission::create(['name' => 'users.index']);
        $permission8 = Permission::create(['name' => 'users.create']);
        $permission9 = Permission::create(['name' => 'users.delete']);

        $permission10 = Permission::create(['name' => 'config.index']);
        $permission11 = Permission::create(['name' => 'config.edit']);

       
        $admin->syncPermissions([
            $permission1, $permission3, $permission4,
            $permission5, $permission6, $permission7,
            $permission8, $permission9, $permission10,
            $permission11
        ]);

        $teacher->syncPermissions([
            $permission4, 
            $permission5, $permission10, 
            $permission11
        ]);

        $user = 'admin_user';
        $name = 'admin';
        $email = 'admin@example.com';
        $password = "password";

        $validator = Validator::make(
            [
                'user' =>  $user,
                'name' =>  $name,
                'email' =>  $email,
                'password' =>  $password,
            ],
            [
                'user'     => 'required|string|unique:users,user',
                'name'     => 'required|string',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required',
            ]
        );
        if ($validator->fails()) {
            $this->info('User not created. See error messages below:');
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return;
        }
        $admin_user = \App\Models\User::factory()->create([
            'user' => $user,
            'name' => $name,
            'email' => $email,
            'password' =>  bcrypt($password),
        ])->assignRole($admin);

        // teacher <------------------------------------------------------> teacher
        $user = 'teacher_user';
        $name = 'teacher';
        $email = 'teacher@example.com';
        $password = "password";

        $validator = Validator::make(
            [
                'user' =>  $user,
                'name' =>  $name,
                'email' =>  $email,
                'password' =>  $password,
            ],
            [
                'user'     => 'required|string|unique:users,user',
                'name'     => 'required|string',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required',
            ]
        );
        if ($validator->fails()) {
            $this->info('User not created. See error messages below:');
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return;
        }
        $teacher_user = \App\Models\User::factory()->create([
            'user' => $user,
            'name' => $name,
            'email' => $email,
            'password' =>  bcrypt($password),
        ])->assignRole($teacher);

        User_has_subject::factory()->create([
            'user_id' => 2,
            'subject_id' => 1,
        ]);

        $this->call(StudentSeeder::class);
    }
}
