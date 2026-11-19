<?php

use Illuminate\Support\Facades\Route;
$namespace = "App\Laravel\Controllers\Portal";

Route::group(['as' => "portal.",
    'namespace' => $namespace,
    'prefix' => "user",
    'middleware' => ["web"]
],function() {

    // Guest only: login and sign up
    Route::group(['as' => 'auth.', 'middleware' => 'portal.guest'], function () {
        Route::get('login', ['as' => 'login', 'uses' => 'AuthenticationController@login']);
        Route::post('login', ['uses' => 'AuthenticationController@authenticate']);

        Route::get('register', ['as' => 'register', 'uses' => 'AuthenticationController@register']);
        Route::post('register', ['as' => 'store', 'uses' => 'AuthenticationController@store']);
    });

    // Logged-in users only
    Route::group(['middleware' => 'portal.auth'], function () {
        Route::get('/', ['as' => 'home', 'uses' => 'MainController@index']);

        Route::post('logout', ['as' => 'auth.logout', 'uses' => 'AuthenticationController@logout']);

        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::get('/', ['as' => 'show', 'uses' => 'ProfileController@show']);
            Route::get('edit', ['as' => 'edit', 'uses' => 'ProfileController@edit']);
            Route::post('edit', ['as' => 'update', 'uses' => 'ProfileController@update']);
        });

        Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
            Route::get('home', ['as' => 'home', 'uses' => 'CmsHomeController@index']);
            Route::get('about', ['as' => 'about', 'uses' => 'CmsAboutController@index']);
            Route::get('contact', ['as' => 'contact', 'uses' => 'CmsContactController@index']);
        });
    });
});
