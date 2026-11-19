<?php

namespace App\Laravel\Controllers\Portal;

use App\Laravel\Requests\PageRequest;

class CmsController extends Controller{

    protected $data;

    public function __construct(){
        parent::__construct();
    }

    // The route only accepts: pages, media, menus (see Routes/Portal.php)
    public function show(PageRequest $request, $page){
        return view("Portal.cms.{$page}");
    }

}
