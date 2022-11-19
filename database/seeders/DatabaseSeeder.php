<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Validator;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        // \App\Models\User::factory(10)->create();

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
        \App\Models\User::factory()->create([
            'user' => $user,
            'name' => $name,
            'email' => $email,
            'password' =>  bcrypt($password),
        ])->assignRole('Admin');



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
        \App\Models\User::factory()->create([
            'user' => $user,
            'name' => $name,
            'email' => $email,
            'password' =>  bcrypt($password),
        ])->assignRole('Teacher');

        $this->call(StudentSeeder::class);
    }
}
