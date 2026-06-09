<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            $token = $user->createToken('admin_session')->plainTextToken;
            session(['api_token' => $token]);

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session()->forget('api_token');

        return redirect()->route('admin.login');
    }

    public function register(Request $request) {
        $credentials = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|confirmed|min:8',
        ]);

        if ($credentials->fails()) {
            return response()->json([
                'errors' => $credentials->errors()
            ], 422);
        }

        try {
            $user = \App\Models\User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),  
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'User registration successful',
                'data' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'User registration failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // login with api
    public function apiLogin(Request $request) {
        $credentials = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($credentials->fails()) {
            return response()->json([
                'errors' => $credentials->errors()
            ], 422);
        }

        $user = \App\Models\User::where('email', $request->email)->first();

        if (!$user || !\Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password',
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]
        ], 200);
    }

    public function apiLogout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout successful',
        ], 200);
    }
}
