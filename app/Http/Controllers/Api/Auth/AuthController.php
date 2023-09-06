<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function register(Request $request){
        
        $user = User::create([
            'user_email' => $request->email,
            'user_store' => '53d6d7fb-89f8-474f-870f-1fb5441727c3',
            'user_password' => Hash::make($request->password),
            'user_uuid' => Str::uuid(),
            'user_store' => 1,
        ]);

        $token = $user->createToken('auth-sanctum')->plainTextToken;

        return response()->json(['message' => 'Login successful', 'access_token' => $token]);
    }

    public function login(Request $request){

        if(Auth::attempt(array('user_email' => $request->email, 'password' => $request->password))){

            $user = Auth::user();
            $token = $user->createToken('auth-sanctum')->plainTextToken;

            return response()->json(['message' => 'Login successful', 'access_token' => $token],200);
        }
        
        return response()->json(['message' => 'Login failed. Invalid email or password.'], 401);
    }
}
