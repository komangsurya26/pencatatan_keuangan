<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Throwable;

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
                abort(401);
            }

            $request->session()->regenerate();

            // return response
            return ResponseHelper::success($user, 'Login Success');
        } catch (\Throwable $th) {
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
            return ResponseHelper::error("Register Failed", 400);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return ResponseHelper::success(null, 'Logout Success');
        } catch (Throwable $th) {
            return ResponseHelper::error("Logout Failed", 400);
        }
    }
} 