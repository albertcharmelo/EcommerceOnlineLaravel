<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function login(Request $request){

        $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string',
            
        ]);

        $credentials = request(['email','password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Credenciales incorrectas', 401
            ]);
        }

        $user = $request->user();
        
        $token = $user->createToken('Api Product access Token');
      
        //dd($token);
        return response()->json([
            'access_token' => $token->accessToken,
            'token_type'=> 'Bearer ',
            'expiries_at' =>$token->token->expires_at->format('Y-m-d'),
        ]);
    }
}
