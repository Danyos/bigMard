<?php

namespace App\Http\Middleware;

use App\Models\Models\PageStatusModel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfigWebSiteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { $status = PageStatusModel::first();

        if ($status && $status->status == "inactive") {
            // API-ի համար բացառություն
            if ($request->is('api/*')) {
                return $next($request); // API ռոուտերը կշարունակեն աշխատել
            }

         abort('503');
        }

        return $next($request);
    }
}
