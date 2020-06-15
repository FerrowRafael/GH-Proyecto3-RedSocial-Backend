<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // USERS
    Route::prefix('users')->group(function () {
        Route::post('/register', 'UserController@register');    // 1
        Route::post('/login', 'UserController@login');          // 2
        Route::get('/all', 'UserController@getUsersAll');       // 4 
        Route::get('/{id}', 'UserController@getUserById');      // 5        
        Route::get('/logout', 'UserController@logout');         // 3 *
        Route::middleware('auth:api')->group(function () {      
            Route::put('/', 'UserController@userUpdate');     
        });
    });
    
    // POSTS
    Route::prefix('posts')->group(function () {
        Route::middleware('auth:api')->group(function () {      
            Route::get('/', 'PostController@getAll');               // 1
            Route::get('/id/{id}', 'PostController@getById');       // 2 Añadidos comentarios
            Route::post('/', 'PostController@insert');              // 3
            Route::put('/{id}', 'PostController@update');           // 4
            Route::delete('/{id}', 'PostController@destroy');       // 5
            Route::get('/search/{title}', 'PostController@getPostByTitle');  
            Route::get('/orderDes', 'PostController@orderPostDesc'); 
        });
    
    });

    // CATEGORIES
    Route::prefix('categories')->group(function () {
        Route::middleware('auth:api')->group(function () {      
            Route::get('','CategoryController@getAll');             // 1
            
        // });
        // Route::middleware(['auth:api','checkRole:admin'])->group(function () {
            Route::post('','CategoryController@insert');            // 2
            Route::put('{id}','CategoryController@update');         // 3
            Route::delete('{id}','CategoryController@destroy');     // 4
        });
    });

    // LIKES
    Route::prefix('likes')->group(function () {
        Route::middleware('auth:api')->group(function () {      
            Route::post('/', 'LikeController@insertLike');          // 1
            Route::delete('/{id}','LikeController@dislike');        // 2
            Route::get('/','LikeController@getLikesAll');
            Route::get('/post/{id}', 'LikeController@getLikeByPostId');
        });
    });

    // COMMENTS
    Route::prefix('comments')->group(function () {
        Route::middleware('auth:api')->group(function () {      
            Route::post('/{id}', 'CommentController@insertComment');// 1
            Route::get('/', 'CommentController@getCommentsAll');    // 2
            Route::get('/{id}', 'CommentController@getCommentById');// 3 **No se si tiene sentido
            Route::put('/{id}', 'CommentController@UpdateComment'); // 4
            Route::delete('/{id}','CommentController@disComment');  // 5
            Route::get('/post/{id}','CommentController@getCommentByPostId');  
        });
    });


});
