<?php

use Illuminate\Support\Facades\Route;
$namespace = "App\Laravel\Controllers\Web";

Route::group(['as' => "web.",
    'namespace' => $namespace,
    'middleware' => ["web"]
],function() {
    Route::get('/','MainController@index')->name('home');
    Route::get('about','MainController@about')->name('about');
    Route::get('contact','MainController@contact')->name('contact');

    Route::group(['prefix' => "articles",'as' => 'articles.'],function(){
        Route::get('/','ArticleController@index')->name('index');
        Route::get('{slug}','ArticleController@show')->name('show');
    });
});
