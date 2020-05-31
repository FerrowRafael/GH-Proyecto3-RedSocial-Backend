<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    // USERS
    Route::prefix('users')->group(function () {
        Route::post('/register', 'UserController@register');    // 1
        Route::post('/login', 'UserController@login');          // 2
        Route::get('/all', 'UserController@getUsersAll');       // 4 
        Route::get('/{id}', 'UserController@getUserById');      // 5        

        Route::middleware('auth:api')->group(function () {      
            Route::get('/logout', 'UserController@logout');     // 3 *
        });
    });
    
    // POSTS
    Route::group([
        'prefix' => 'posts',
        'middleware' => 'auth:api'
    ], function () {
        Route::get('/', 'PostController@getAll');               // 1
        Route::get('/{id}', 'PostController@getById');          // 2
        Route::post('/', 'PostController@insert');              // 3
        Route::put('/{id}', 'PostController@update');           // 4
        Route::delete('/{id}', 'PostController@destroy');       // 5
    });
    Route::group([
        'prefix'=>'categories',
        'middleware'=>'auth:api'
    ], function(){
        Route::get('','CategoryController@getAll');             // 1
        Route::post('','CategoryController@insert');            // 2
        Route::put('{id}','CategoryController@update');         // 3
        Route::delete('{id}','CategoryController@destroy');        // 4
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
