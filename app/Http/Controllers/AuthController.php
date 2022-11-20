<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Database\QueryException;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request) {
        try {
            $data = json_decode($request->getContent(), true);
            $request = new Request($data);

            $fields = $request->validate([
                'user' => 'required',
                'password' => 'required|string',
            ]);

            // Check user
            $user = User::where('user', $fields['user'])->first();

            // Check password
            if(!$user || !Hash::check($fields['password'], $user->password)) {
                return response([
                    'message' => 'Usuario o contraseña inválida'
                ], 401);
            }
            
            // if (!$user->hasPermissionTo('admin')) {
            //     $user->givePermissionTo('admin');
            // }
            $user->getRoleNames();
            $user->getPermissionsViaRoles();
            $token = $user->createToken('myapptoken')->plainTextToken;
            $response = [
                'data' => $user,
                'token' => $token
            ];

            return response($response, 200);

        } catch (QueryException $exception) {
            $response = [
                'message' => "Ha ocurrido un error al intentar iniciar sesion",
                'error' => $exception->getMessage(),
            ];

            return response($response , 500);
        }
    }
}
