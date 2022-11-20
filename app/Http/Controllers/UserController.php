<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_has_subject;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = json_decode($request->getContent(), true);
        // $request = new Request($data);
        try {

                    $users = User::with('roles')->get();

                    if(isset($users)){
                        $response = [
                            'data' => $users,
                            'message' => "Usuarios listados",
                        ];
            
                        return response($response, 200);
                    }

                    $response = [
                        'data' => null,
                        'message' => $users,
                    ];

                    return response($response , 200);
                
                
        } catch (QueryException $exception) {
                    $response = [
                        'message' => "Error al intentar obtener Usuarios",
                        'error' => $exception->getMessage(),
                    ];

                    return response($response , 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {

            $user = User::find($id);
            if(!$user){
                $response = [
                    'data' => null,
                    'message' => "Usuario no encontrado",
                ];
    
                return response($response, 404);
            }

            
            $user = User::where('id', '=' ,$id);
            $user->delete(); 

            $response = [
                'data' => $id,
                'message' => "Usuario eliminado con exito",
            ];

            return response($response , 200);
        
        
        } catch (QueryException $exception) {
                    $response = [
                        'message' => "Error al intentar eliminar un Usuarios",
                        'error' => $exception->getMessage(),
                    ];

                    return response($response , 500);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // $admin = Role::create(['name' => 'admin']);
            // $teacher = Role::create(['name' => 'teacher']);
    
            // $permission1 = Permission::create(['name' => 'view.subjects']);
            // // $permission2 = Permission::create(['name' => 'view.my-subject']);
            // $permission3 = Permission::create(['name' => 'view.users']);
            // $permission4 = Permission::create(['name' => 'view.config']);
            
    
            // //actions
            // $permission5 = Permission::create(['name' => 'subjects.index']);
            // $permission6 = Permission::create(['name' => 'students.index']);
            
            // $permission7 = Permission::create(['name' => 'users.index']);
            // $permission8 = Permission::create(['name' => 'users.create']);
            // $permission9 = Permission::create(['name' => 'users.delete']);
    
            // $permission10 = Permission::create(['name' => 'config.index']);
            // $permission11 = Permission::create(['name' => 'config.edit']);
    
           
            // $admin->syncPermissions([
            //     $permission1, $permission3, $permission4,
            //     $permission5, $permission6, $permission7,
            //     $permission8, $permission9, $permission10,
            //     $permission11
            // ]);
    
            // $teacher->syncPermissions([
            //     $permission4, 
            //     $permission5, $permission10, 
            //     $permission11
            // ]);
            
            $data = json_decode($request->getContent(), true);
            $request = new Request($data);
            $fields = $request->validate([
                "role" => "required|string",
                "subject_id" => "numeric",
                "user" => "required|string",
                "name" => "required|string",
                "email" => "required|string|email|unique:users,email",
                "password" => "required|string"
            ]);

            if($fields['role'] == "admin"){
                $user = User::create([
                    "role" => $fields['role'],
                    "user" => $fields['user'],
                    "name" => $fields['name'],
                    "email" => $fields['email'],
                    'password' => bcrypt($fields['password']),
                ])->assignRole('admin');
            }else if($fields['role'] == "teacher"){
                $user = User::create([
                    "role" => $fields['role'],
                    "user" => $fields['user'],
                    "name" => $fields['name'],
                    "email" => $fields['email'],
                    'password' => bcrypt($fields['password']),
                ])->assignRole('teacher');

                User_has_subject::create([
                    "user_id" => $user->id,
                    "subject_id" => $fields['subject_id'],
                ]);
            }

            if($user){
                $response = [
                    'data' => $user,
                    'message' => 'Usuario creado con exito',
                ];
                
                return response($response, 201);
            }

            $response = [
                'data' => null,
                'message' => 'no se pudo crear un usuario',
            ];
            
            return response($response, 400);
        } catch (QueryException $exception) {
            $response = [
                'message' => "Ha ocurrido un error al crear un usuario",
                'error' => $exception->getMessage(),
                // 'code' => 500
            ];

            return response($response , 500);
        }
    }
}
