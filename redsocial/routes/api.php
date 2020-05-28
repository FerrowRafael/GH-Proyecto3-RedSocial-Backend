<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    // USERS
    Route::prefix('users')->group(function () {
        Route::post('/register', 'UserController@register');
        Route::post('/login', 'UserController@login');

        Route::middleware('auth:api')->group(function () {
            Route::get('/logout', 'UserController@logout'); //** */
            Route::get('/info', 'UserController@getUserInfo');
        });
    });
    
    // POSTS
    Route::group([
        'prefix' => 'posts',
        'middleware' => 'auth:api'
    ], function () {
        Route::get('/', 'PostsController@getAll');
        Route::get('/{id}', 'PostsController@getById');
        Route::post('/', 'PostsController@insert');
    });

    // LIKES
    // Route::group([
    //     'prefix' => 'categories',
    //     'middleware' => 'auth:api'
    // ], function () {
    //     Route::post('/', 'CategoryController@insert');
    //     Route::get('/','CategoryController@getAll');
    // });
});
