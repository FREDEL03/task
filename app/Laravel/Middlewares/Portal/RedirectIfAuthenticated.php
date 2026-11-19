<?php

namespace App\Laravel\Middlewares\Portal;

use Closure;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next)
    {
        return auth('portal')->check() ? redirect()->route('portal.home') : $next($request);
    }
}
