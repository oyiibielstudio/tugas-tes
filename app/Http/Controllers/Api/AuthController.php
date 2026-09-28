<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'token_type'   => 'Bearer',
            'access_token' => $token,
            'user'         => $user,
            'message'      => "Berhasil register"
        ], 201);
    }

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email'    => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email atau Password salah',
                ], 401);
            }

            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'token_type'   => 'Bearer',
                'access_token' => $token,
                'user'         => $user,
                'message'      => "Berhasil login"
            ], 200);

        } catch (Exception $error) {
            return response()->json([
                'status'  => false,
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json([
            'user'    => $user,
            'message' => "Berhasil logout"
        ], 200);
    }
}