<?php

namespace App\Http\Controllers;

use App\Like;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function insertLike(Request $request){
        try {
            $body = Validator::make($request->all(), [
                'id_post'=>'required',
                'id_user'=> 'required'
            ]);
            $body = $request->all();
            $body['user_id'] = Auth::id();
            $like = Like::create($body);
            return response([
                'message' => 'Like creado correctamente'
            ], 200);
        } catch (\Exception $exception){
            return response($exception, 500);
        }     
    }

    // GET LIKES ALL 
    public function getLikesAll(){ 
        $likes = Like::with('user', 'post')->get();
        return $likes;
    }

    // DISLIKE 
    public function dislike($id){
        try {
            // $body = Validator::make($request->all(), [
            //     'id_post'=>'required',
            //     'id_user'=> 'required'
            // ]);
            $like = Like::where('post_id', $id)
            ->where('user_id', Auth::id());
            $like->delete();
            return response([
                'message' => 'Like borrado correctamente'
            ], 200);
        } catch (\Exception $exception){
            return response($exception, 500);
        }     
        
    }

    // GET POST BY ID
    public function getLikeByPostId($id){
        //  $like = Like::all();
            $like = Like::where('post_id', $id)->get();
            // ->where('user_id', Auth::id());
            // if (Auth::id() !== $like->user_id){
        //     return response([
        //         'message' => 'Wrong Credentials'
        //     ], 400);
        // }
           return $like;
       }
}
