<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Requests\PageRequest;

class MainController extends Controller{

    public function index(PageRequest $request){
        return view('Backoffice.dashboard');
    }

}
