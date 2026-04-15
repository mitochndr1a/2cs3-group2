<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ApiKey;
use Illuminate\Http\Request;

class ApiKeyController extends Controller
{
    // POST /api/auth/generate
    // Body: { "name": "My App" }
    public function generate(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $apiKey = ApiKey::generate($data['name']);

        return response()->json([
            'message' => 'API key generated. Store it safely — it will not be shown again.',
            'name'    => $apiKey->name,
            'api_key' => $apiKey->key,
        ], 201);
    }

    // GET /api/auth/keys  — list all keys (for admin use)
    public function index()
    {
        $keys = ApiKey::select('id', 'name', 'is_active', 'created_at')->get();
        return response()->json($keys);
    }

    // DELETE /api/auth/keys/{id}  — revoke a key
    public function revoke($id)
    {
        $key = ApiKey::find($id);

        if (!$key) {
            return response()->json(['error' => 'Key not found.'], 404);
        }

        $key->update(['is_active' => false]);
        return response()->json(['message' => 'API key revoked.']);
    }
}