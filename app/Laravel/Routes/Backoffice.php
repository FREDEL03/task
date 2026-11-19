<?php

use Illuminate\Support\Facades\Route;
$namespace = "App\Laravel\Controllers\Backoffice";

Route::group(['as' => "backoffice.",
    'namespace' => $namespace,
    'prefix' => "backoffice",
    'middleware' => ["web"]
],function() {

    Route::group(['as' => 'auth.','middleware' => "backoffice.guest"],function(){
        Route::get('login','AuthController@showLogin')->name('login');
        Route::post('login','AuthController@login')->name('login.submit');
        Route::get('register','AuthController@showRegister')->name('register');
        Route::post('register','AuthController@register')->name('register.submit');
    });

    Route::group(['middleware' => "backoffice.auth"],function(){
        Route::get('/','MainController@index')->name('dashboard');
        Route::post('logout','AuthController@logout')->name('auth.logout');

        Route::group(['prefix' => "profile",'as' => 'profile.'],function(){
            Route::get('/','ProfileController@show')->name('show');
            Route::get('edit','ProfileController@edit')->name('edit');
            Route::post('edit','ProfileController@update')->name('update');
        });

        // list/view, edit, delete only (no create)
        Route::resource('admins','AdminController')->except(['create','store']);
        Route::resource('users','UserController')->except(['create','store']);
    });
});
