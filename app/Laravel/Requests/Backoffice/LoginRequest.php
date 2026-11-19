<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;

class LoginRequest extends RequestManager
{
    public function rules(){
        return [
            'email' => "required|email",
            'password' => "required",
        ];
    }

    public function messages(){
        return [
            'required' => "Field is required.",
            'email.email' => "Invalid email address.",
        ];
    }
}
