<?php

namespace App\Laravel\Middlewares\Portal;

use Closure;

class Authenticate {

    /**
     * Only logged-in portal users can pass. Everyone else goes to the login page.
     */
    public function handle($request, Closure $next)
    {
        if(!auth('portal')->check()){
            session()->flash('notification-status', "warning");
            session()->flash('notification-msg', "Unauthorized access. Please login first.");
            return redirect()->route('portal.auth.login');
        }

        return $next($request);
    }

}
