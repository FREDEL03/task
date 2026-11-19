<?php

use Illuminate\Support\Facades\Route;
$namespace = "App\Laravel\Controllers\Backoffice";

Route::group(['as' => "backoffice.",
    'namespace' => $namespace,
    'prefix' => "admin",
    'middleware' => ["web"]
],function() {

    // Guest only: login and sign up
    Route::group(['as' => 'auth.', 'middleware' => 'backoffice.guest'], function () {
        Route::get('login', ['as' => 'login', 'uses' => 'AuthenticationController@login']);
        Route::post('login', ['uses' => 'AuthenticationController@authenticate']);
        Route::get('register', ['as' => 'register', 'uses' => 'AuthenticationController@register']);
        Route::post('register', ['as' => 'store', 'uses' => 'AuthenticationController@store']);
    });

    // Logged-in admins only
    Route::group(['middleware' => 'backoffice.auth'], function () {
        Route::get('/', ['as' => 'dashboard', 'uses' => 'MainController@index']);
        Route::post('logout', ['as' => 'auth.logout', 'uses' => 'AuthenticationController@logout']);
        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::get('/', ['as' => 'show', 'uses' => 'ProfileController@show']);
            Route::get('edit', ['as' => 'edit', 'uses' => 'ProfileController@edit']);
            Route::post('edit', ['as' => 'update', 'uses' => 'ProfileController@update']);
        });

        // Admin accounts: list, view, edit, delete (no create)
        Route::group(['prefix' => 'admins', 'as' => 'admins.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'AdminController@index']);
            Route::get('{id}', ['as' => 'show', 'uses' => 'AdminController@show']);
            Route::get('{id}/edit', ['as' => 'edit', 'uses' => 'AdminController@edit']);
            Route::put('{id}', ['as' => 'update', 'uses' => 'AdminController@update']);
            Route::delete('{id}', ['as' => 'destroy', 'uses' => 'AdminController@destroy']);
        });

        // User portal accounts: list, view, edit, delete (no create)
        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
            Route::get('{id}', ['as' => 'show', 'uses' => 'UserController@show']);
            Route::get('{id}/edit', ['as' => 'edit', 'uses' => 'UserController@edit']);
            Route::put('{id}', ['as' => 'update', 'uses' => 'UserController@update']);
            Route::delete('{id}', ['as' => 'destroy', 'uses' => 'UserController@destroy']);
        });
    });
});
