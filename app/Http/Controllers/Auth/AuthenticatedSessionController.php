<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        try {    
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            // Use the correct guard for API authentication
            if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
                $user = Auth::guard('web')->user();
    
                // Create token using Sanctum
                $token = $user->createToken('auth-token')->plainTextToken;
    
                return response()->json([
                    'message' => 'Login successful',
                    'token' => $token,
                    'user' => $user,
                ]);
            }

            return response()->json(['error' => 'The provided credentials are incorrect.'], 401);
    
        } catch (\Throwable $e) {
            Log::error('Login error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'An error occurred during login'], 500);
        }
    }

    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
}