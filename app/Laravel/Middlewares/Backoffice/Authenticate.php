<?php

namespace App\Laravel\Middlewares\Backoffice;

use Closure;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        if (!auth('backoffice')->check()) {
            return redirect()->route('backoffice.auth.login')->with('error', 'Please log in first.');
        }

        return $next($request);
    }
}
