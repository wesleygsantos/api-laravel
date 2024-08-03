<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {

        $input = $request->validated();

        $credentials = [
            'email' => $input['email'],
            'password' => $input['password'],
        ];

        $token = auth()->attempt($credentials);

        if($token){
            return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => 3600
            ]);
        }else{
            return response()->json([
                'status' => 'erro',
                'message' => 'Dados inválidos!'
            ], 401);
        }

    }



}
