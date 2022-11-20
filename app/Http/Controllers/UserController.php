<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
