<?php

use Illuminate\Support\Facades\Route;
$namespace = "App\Laravel\Controllers\Web";

Route::group(['as' => "web.",
    'namespace' => $namespace,
    'middleware' => ["web"]
],function() {
    Route::get('/', ['as' => 'home', 'uses' => 'MainController@index']);
    Route::get('about', ['as' => 'about', 'uses' => 'MainController@about']);
    Route::get('contact', ['as' => 'contact', 'uses' => 'MainController@contact']);

    Route::group(['prefix' => 'articles', 'as' => 'articles.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'ArticleController@index']);
        Route::get('{slug}', ['as' => 'show', 'uses' => 'ArticleController@show']);
    });
});
