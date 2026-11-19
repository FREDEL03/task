<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\Admin;

class AdminController extends AccountController{

    protected $model = Admin::class;
    protected $base = 'backoffice.admins';
    protected $title = 'Admin Accounts';

    protected function isSelf($record){
        return auth('backoffice')->id() === $record->id;
    }
}
