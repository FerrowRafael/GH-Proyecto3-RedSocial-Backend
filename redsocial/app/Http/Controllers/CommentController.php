<?php

namespace App\Http\Controllers;

use App\Like;
use App\User;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    // // INSERT COMMENT
    // public function insertComment(Request $request)
    // {
    //     try {
    //         $body = $request->all();
    //         $body['user_id'] = Auth::id();
    //         $comment = Comment::create($body);
    //         return response($comment, 201);
    //     } catch (\Exception $e) {
    //         return response([
    //             'error' => $e->getMessage(),
    //             'message' => 'There was a problem trying to create the comment',
    //         ], 500);
    //     }
    // }

    public function insertComment(Request $request, $id)
    {
        try {
            $body = $request->validate([
                'text' => 'required|string'
            ]);
            $body['post_id'] = $id;
            $body['user_id'] = Auth::id();
            $comment = Comment::create($body);
            return $comment;
        } catch (\Exception $e) {
            return response([
                'error' => $e->getMessage()
            ], 500);
        }
    }
    // GET COMMENTS ALL
    public function getAll()
    {
        try {
            $categories = Category::select(['id', 'name'])->get();
            return $categories;
        } catch (\Exception $e) {
            return response([
                'error' => $e
            ], 500);
        }
    }

    // GET POST BY ID
    public function getCommentById(Request $request, $id)
    { //with es como include o populate()
        $posts = Post::find($id)::with('user')->get();
        return $posts;
    }
    // UPDATE COMMENT
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|unique:categories|string'
            ]);
            $body = $request->all();
            $category = Category::find($id);
            $category->update($body);
            return response([
                'category' => $category,
                'message' => 'Category succesfully updated',
            ]);
        } catch (\Exception $e) {
            return response([
                'error' => $e->getMessage(),
                'message' => 'There was a problem trying to update the category',
            ], 500);
        }
    }

    // DELETE COMMENT
    public function destroy(Request $request, $id)
    {
        try {
            $category = Category::find($id);
            // $category->products()->detach();
            $category->delete();
            return response([
                'category' => $category,
                'message' => 'Category succesfully deleted',
            ]);
        } catch (\Exception $e) {
            return response([
                'error' => $e->getMessage(),
                'message' => 'There was a problem trying to delete the category',
            ], 500);
        }
    }
}
