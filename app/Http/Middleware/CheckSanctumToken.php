<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class CheckSanctumToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        // Check  token has expired
        if ($token && !PersonalAccessToken::findToken($token)) {
            return response()->json(['message' => 'Token has expired'], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
