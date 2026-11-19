<?php

namespace App\Laravel\Controllers\Web;

class ArticleController extends Controller{

    public function index(){
        return view('Web.articles.index', ['articles' => config('articles')]);
    }

    public function show($slug){
        $article = config("articles.$slug");
        abort_unless($article, 404);

        return view('Web.articles.show', ['article' => $article]);
    }
}
