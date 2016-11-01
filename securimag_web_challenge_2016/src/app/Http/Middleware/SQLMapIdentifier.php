<?php

namespace App\Http\Middleware;

use Closure;

class SQLMapIdentifier
{
    public function handle($request, Closure $next)
    {
        $user_agent = $request->header('USER-AGENT');
        if ($user_agent !== null && strpos(strtolower($user_agent), 'sqlmap') !== false) {
            return view('sqlmap_catcher');
        }
        return $next($request);
    }
}