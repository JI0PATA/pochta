<?php

namespace App\Http\Middleware;

use Closure;

class GroupMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $prefix = $request->route()->getPrefix();
        $prefix = substr($prefix, 1, strlen($prefix));

        if ($prefix !== session('group')) return redirect()->route(session('group').'.index');

        return $next($request);
    }
}
