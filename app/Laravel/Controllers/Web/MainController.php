<?php

namespace App\Laravel\Controllers\Web;

use App\Laravel\Requests\PageRequest;

class MainController extends Controller{

    public function index(PageRequest $request){
        return view('Web.home', ['articles' => array_slice(config('articles'), 0, 3, true)]);
    }

    public function about(PageRequest $request){
        return view('Web.about');
    }

    public function contact(PageRequest $request){
        return view('Web.contact');
    }

}
