<?php

namespace App\Laravel\Controllers\Portal;

use App\Laravel\Requests\PageRequest;

class CmsAboutController extends Controller{

    public function index(PageRequest $request){
        return view('Portal.cms.about');
    }

}
