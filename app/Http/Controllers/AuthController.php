<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createtoken('myjesusshop')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return response($response, 201);
    }

    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            //Error
            return response([
                'success' => false,
                'message' => 'wrong password',
            ]);
        }

        $token = $user->createToken('myjesusshop')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return response($response, 201);
    }

    public function logout(Request $request){
        return "auth logout";
    }
}
