<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Firebase\JWT\JWT;

class AuthController extends Controller
{
    public function getToken(Request $request): JsonResponse
    {
        $request->validate([
            'app_key' => 'required|string',
            'app_secret' => 'required|string',
        ]);

        $configuredKey = config('services.token.app_key');
        $configuredSecret = config('services.token.app_secret');

        if (!$configuredKey || !$configuredSecret) {
            return response()->json([
                'message' => 'Token configuration missing.'
            ], 500);
        }

        $providedKey = $request->input('app_key');
        $providedSecret = $request->input('app_secret');

        if (!hash_equals((string) $configuredKey, (string) $providedKey) || !hash_equals((string) $configuredSecret, (string) $providedSecret)) {
            return response()->json([
                'message' => 'Invalid credentials.'
            ], 401);
        }

        $now = time();
        $payload = [
            'iss' => config('app.url'),
            'sub' => 'public',
            'iat' => $now,
            'exp' => $now + 3600,
        ];

        $token = JWT::encode($payload, (string) $configuredSecret, 'HS256');

        return response()->json([
            'token' => $token,
        ]);
    }
}


