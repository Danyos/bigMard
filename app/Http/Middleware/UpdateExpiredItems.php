<?php

namespace App\Http\Middleware;

use App\Models\Product\ItemModel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateExpiredItems
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        ItemModel::whereNotNull('order_time')
            ->where('order_time', '<', now())
            ->update(['order_time' => null]);

        return $next($request);

    }
}
