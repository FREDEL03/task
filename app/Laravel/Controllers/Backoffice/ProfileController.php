<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\Admin;
use App\Laravel\Traits\GuardedAccount;

class ProfileController extends Controller{
    use GuardedAccount;

    protected $guard = 'backoffice';
    protected $model = Admin::class;
    protected $home = 'backoffice.dashboard';
}
