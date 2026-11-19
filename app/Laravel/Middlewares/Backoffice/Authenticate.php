<?php

namespace App\Laravel\Middlewares\Backoffice;

use Closure;

class Authenticate {

    /**
     * Only logged-in admins can pass. Everyone else goes to the login page.
     */
    public function handle($request, Closure $next)
    {
        if(!auth('backoffice')->check()){
            session()->flash('notification-status', "warning");
            session()->flash('notification-msg', "Unauthorized access. Please login first.");
            return redirect()->route('backoffice.auth.login');
        }

        return $next($request);
    }

}
