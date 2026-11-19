<?php

use Illuminate\Support\Facades\Route;
$namespace = "App\Laravel\Controllers\Portal";

Route::group(['as' => "portal.",
    'namespace' => $namespace,
    'prefix' => "portal",
    'middleware' => ["web"]
],function() {

    Route::group(['as' => 'auth.','middleware' => "portal.guest"],function(){
        Route::get('login','AuthController@showLogin')->name('login');
        Route::post('login','AuthController@login')->name('login.submit');
        Route::get('register','AuthController@showRegister')->name('register');
        Route::post('register','AuthController@register')->name('register.submit');
    });

    Route::group(['middleware' => "portal.auth"],function(){
        Route::get('/','MainController@index')->name('home');
        Route::post('logout','AuthController@logout')->name('auth.logout');

        Route::group(['prefix' => "profile",'as' => 'profile.'],function(){
            Route::get('/','ProfileController@show')->name('show');
            Route::get('edit','ProfileController@edit')->name('edit');
            Route::post('edit','ProfileController@update')->name('update');
        });

        // CMS pages: add a slug here and a matching Views/Portal/cms/<slug>.blade.php
        Route::get('cms/{page}','CmsController@show')->name('cms.show')->where('page', 'pages|media|menus');
    });
});
