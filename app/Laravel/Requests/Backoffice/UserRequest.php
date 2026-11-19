<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;

class UserRequest extends RequestManager
{
    public function rules(){
        // {user} is the id in the URL: backoffice/users/{user}
        $id = $this->route('user');

        return [
            'name' => "required|between:2,100",
            'email' => "required|email|unique:users,email,{$id}",
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
