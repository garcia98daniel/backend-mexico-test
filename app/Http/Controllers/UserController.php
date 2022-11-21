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

    public function profile()
    {
        try {
            
           $user = User::where('id', '=', auth()->user()->id)
           ->with('subjectPivot.subjects')
           ->with('roles')->first();

            if($user){
                $response = [
                    'data' => $user,
                    'message' => 'informacion del usuario listada con exito',
                ];
                
                return response($response, 200);
            }

            $response = [
                'data' => null,
                'message' => 'no se pudo obtener la informacion del usuario',
            ];
            
            return response($response, 400);
        } catch (QueryException $exception) {
            $response = [
                'message' => "Ha ocurrido un error al obtener la informacion del usuario",
                'error' => $exception->getMessage(),
                // 'code' => 500
            ];

            return response($response , 500);
        }
    }

    public function updateProfile(Request $request)
    {
        try {
            $data = json_decode($request->getContent(), true);
            $request = new Request($data);

            $fields = $request->validate([
                "user" => "required|string",
                "name" => "required|string",
                "email" => "required|string|email|unique:users,email",
                "password" => "required|string"
            ]);

            $userUpdate = User::where("id", auth()->user()->id )->update([
                "user" => $request->user,
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password)
            ]);

            if($userUpdate){
                $user = User::where("id", auth()->user()->id)->with('roles')->first();
                $user->getPermissionsViaRoles();

                $response = [
                    'data' => $user,
                    'message' => "datos actualizados con éxito.",
                ];
                
                return response($response, 200);
            }
            
            $response = [
                'data' => null,
                'error' => "Ups!, error al actualizar datos."
            ];
            
            return response($response, 404);

        } catch (QueryException $exception) {
            $response = [
                'error' =>  $exception->getMessage(),
                'message' => "Error al actualizar datos.",
            ];

            return response($response , 500);
        }
    }
}
