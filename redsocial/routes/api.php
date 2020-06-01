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
        Route::get('/{id}', 'PostController@getById');          // 2 Añadidos comentarios
        Route::post('/', 'PostController@insert');              // 3
        Route::put('/{id}', 'PostController@update');           // 4
        Route::delete('/{id}', 'PostController@destroy');       // 5

    });

    // CATEGORIES
    Route::group([
        'prefix'=>'categories',
        'middleware'=>'auth:api'
    ], function(){
        Route::get('','CategoryController@getAll');             // 1
        Route::post('','CategoryController@insert');            // 2
        Route::put('{id}','CategoryController@update');         // 3
        Route::delete('{id}','CategoryController@destroy');     // 4
    });

    // LIKES
    Route::group([
        'prefix' => 'likes',
        'middleware' => 'auth:api'
    ], function () {
        Route::post('/', 'LikeController@insertLike');          // 1
        Route::delete('/{id}','LikeController@dislike');        // 2
        // Route::get('/','LikeController@getLikesAll');
        // Route::get('/{id}', 'LikeController@getLikeById');
    });

    // LIKES
    Route::group([
        'prefix' => 'comments',
        'middleware' => 'auth:api'
    ], function () {
        Route::post('/{id}', 'CommentController@insertComment');    // 1
        Route::get('/','CommentController@getCommentsAll');     // 2
        Route::get('/{id}', 'CommentController@getCommentById');// 3 **No se si tiene sentido
        Route::put('/{id}', 'CommentController@UpdateComment'); // 4
        Route::delete('/{id}','CommentController@disComment');  // 5
    });
});
