<?php

namespace App\Http\Controllers;

use App\Like;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function insertLike(Request $request){
        $body = $request->all();
        $body['user_id'] = Auth::id();
        $like = Like::create($body);
        return response($like, 201);
    }

    // GET LIKES ALL 
    public function getLikesAll()
    { //with es como include o populate()
        $likes = Like::with('user', 'post')->get();
        return $likes;
    }

    // DISLIKE
    public function dislike($id){   
        $like = Like::find($id);
        dd($like->user_id);
        if (Auth::id() !== $like->user_id){
            return response([
                'message' => 'Wrong Credentials'
            ], 400);
        }
        $like->delete();
        return response([
            'message' => 'Borrado correctamente'
        ], 200);
    }
}
