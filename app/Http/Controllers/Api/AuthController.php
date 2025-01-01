<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            // validate request
            $request->validate([
                'email' => ['required', 'email'],
                'password' => 'required',
            ]);

            // find user by email
            $credentials = request([
                'email',
                'password',
            ]);
            if (!Auth::attempt($credentials)) {
                return ResponseHelper::error('Unauthorized', 401);
            }

            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new Exception('Incorrect Password', 401);
            }

            // generate token
            $tokenResult = $user->createToken('authToken')->plainTextToken;

            // return response
            return ResponseHelper::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Login Success');
        } catch (Exception $th) {
            return ResponseHelper::error("Login Failed", 400);
        }
    }

    public function register(Request $request)
    {
        try {
            // validate request
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', Password::defaults()],
            ]);

            // create user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // return response
            return ResponseHelper::success([
                'user' => $user
            ], 'Register Success');
        } catch (\Throwable $th) {
            dd($th);
            return ResponseHelper::error("Register Failed", 400);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();
        return ResponseHelper::success($token, 'Logout Success');
    }
}
