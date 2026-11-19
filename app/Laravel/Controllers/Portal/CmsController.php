<?php

namespace App\Laravel\Controllers\Portal;

class CmsController extends Controller{

    // The route's ->where() limits $page to the known CMS views.
    public function show($page){
        return view("Portal.cms.$page");
    }

}
