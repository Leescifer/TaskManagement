<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Singup Api (name, email, password, confirm_password)
    public function signup(Request $request){

        $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed"
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            "status" => true,
            "message" => "User registered successfully"
        ]);

        

        
    }

    //Signin Api (email, password)
    public function signin(Request $request) {

        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
    
        if (!Auth::attempt($request->only("email", "password"))) {
            return response()->json([
                "status" => false,
                "message" => "Invalid credentials"
            ], 401);
        }
    
        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;
    
        return response()->json([
            "status" => true,
            "message" => "Login successful",
            "access_token" => $token,
            "token_type" => "Bearer",
        ]);
    }

    //Profile API
    public function profile(){

        return response()->json([
            "status" => true,
            "user" => Auth::user()
        ]);

    }
    
    //Logout API
    public function logout(Request $request){

        $request->user()->currentAccessToken()->delete();

        return response()->json([
            "status" => true,
            "message" => "Logged out successfully"
        ]);
    }
}







