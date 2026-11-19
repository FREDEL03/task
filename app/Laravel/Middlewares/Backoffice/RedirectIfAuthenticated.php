<?php

namespace App\Laravel\Middlewares\Backoffice;

use Closure;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next)
    {
        return auth('backoffice')->check() ? redirect()->route('backoffice.dashboard') : $next($request);
    }
}
