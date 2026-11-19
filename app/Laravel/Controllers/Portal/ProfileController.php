<?php

namespace App\Laravel\Controllers\Portal;

use App\Laravel\Models\User;
use App\Laravel\Traits\GuardedAccount;

class ProfileController extends Controller{
    use GuardedAccount;

    protected $guard = 'portal';
    protected $model = User::class;
    protected $home = 'portal.home';
}
