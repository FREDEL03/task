<?php

namespace App\Laravel\Middlewares\Portal;

use Closure;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        if (!auth('portal')->check()) {
            return redirect()->route('portal.auth.login')->with('error', 'Please log in first.');
        }

        return $next($request);
    }
}
