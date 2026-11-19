<?php

namespace App\Laravel\Controllers\Web;

use App\Laravel\Requests\PageRequest;

class MainController extends Controller{

    protected $data;

    public function __construct(){
        parent::__construct();
    }

    public function index(PageRequest $request){
        $articles = config('articles');

        // the first article is the featured one, the rest go in the list
        $this->data['featured_slug'] = array_key_first($articles);
        $this->data['featured'] = $articles[$this->data['featured_slug']];
        $this->data['articles'] = array_slice($articles, 1, null, true);

        return view('Web.home', $this->data);
    }

    public function about(PageRequest $request){
        return view('Web.about');
    }

    public function contact(PageRequest $request){
        return view('Web.contact');
    }

}
