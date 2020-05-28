<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPostsInfo(Request $request)
    {
        $post = Auth::post(); //req.user
        // $request->user();
        return response($post);
    }

    public function getUserInfo(Request $request)
    {
        $user = Auth::user(); //req.user
        // $request->user();
        return response($user);
    }

    //Obtener post de cada usuario
    public function getAll()
    { //with es como include o populate()
        $posts = Post::with('user')->get();
        return $posts;
    }
}
