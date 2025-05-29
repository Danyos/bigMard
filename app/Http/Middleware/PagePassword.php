<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PagePassword
{
    public function handle(Request $request, Closure $next)
    {
        // Եթե session-ում կա "page_password_verified" և այն չի անցել 1 ժամից ավել
        if (
            session('page_password_verified') &&
            session('page_password_verified_at') &&
            now()->diffInMinutes(session('page_password_verified_at')) < 60
        ) {
            return $next($request);
        }

        // Սարքի այս էջը՝ ստուգելու համար գաղտնաբառը
        return redirect()->route('page.password.form', ['redirect' => $request->path()]);
    }
}
