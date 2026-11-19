<?php

namespace App\Laravel\Controllers\Portal;

use App\Laravel\Requests\PageRequest;

class CmsHomeController extends Controller{

    public function index(PageRequest $request){
        $articles = config('articles');

        // the first article is the featured one, the rest go in the list
        $featured_slug = array_key_first($articles);
        $featured = $articles[$featured_slug];
        $articles = array_slice($articles, 1, null, true);

        return view('Portal.cms.home', compact('featured_slug', 'featured', 'articles'));
    }

}
