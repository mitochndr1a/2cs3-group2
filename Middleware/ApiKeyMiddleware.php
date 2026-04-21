<?php

namespace App\Http\Middleware;

use App\Models\ApiKey;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Accept key from header OR query param
        $key = $request->header('X-API-KEY') ?? $request->query('api_key');

        if (!$key) {
            return response()->json([
                'error' => 'API key missing. Pass it as X-API-KEY header or ?api_key= query param.'
            ], 401);
        }

        $apiKey = ApiKey::where('key', $key)->where('is_active', true)->first();

        if (!$apiKey) {
            return response()->json([
                'error' => 'Invalid or inactive API key.'
            ], 403);
        }

        return $next($request);
    }
}