<?php

namespace App\Http\Middleware;

use Closure;

class ApiKeyAuthentication
{
    public function handle($request, Closure $next)
    {
        $key = $request->query('X-API-Key');
        $password = $request->query('X-API-Password');
        // Verify key and password against expected values
        if ($key !== 'X-API-BigMard-Armenia' || $password !== 'PSW-X-API-Big-Mard-Armenia') {
            return response()->json(['error' => $key], 401);
        }

        return $next($request);
    }
}
