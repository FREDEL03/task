<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\User;

class UserController extends AccountController{

    protected $model = User::class;
    protected $base = 'backoffice.users';
    protected $title = 'User Portal Accounts';
}
