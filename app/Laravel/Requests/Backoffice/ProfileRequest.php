<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;

class ProfileRequest extends RequestManager
{
    public function rules(){
        // ignore the logged-in admin's own email when checking for duplicates
        $id = auth('backoffice')->id();

        return [
            'name' => "required|between:2,100",
            'email' => "required|email|unique:admins,email,{$id}",
            'password' => "nullable|between:6,20|confirmed",
        ];
    }

    public function messages(){
        return [
            'required' => "Field is required.",
            'name.between' => "Name should be between 2 to 100 characters.",
            'email.email' => "Invalid email address.",
            'email.unique' => "Email address is already used.",
            'password.between' => "Password should be between 6 to 20 characters.",
            'password.confirmed' => "Password does not match.",
        ];
    }
}
