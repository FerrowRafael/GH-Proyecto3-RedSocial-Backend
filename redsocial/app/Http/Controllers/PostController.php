<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;
// use Illuminate\Support\Facades\Log;

class PostController extends Controller
{

    // GET POSTS ALL 
    public function getAll()
    { //with es como include o populate()
        $posts = Post::with('user', 'category', 'comment.user', 'likes')->get();
        return $posts;;
    }

    // GET POST BY ID
    public function getById($id)
    { //with es como include o populate()
        $post = Post::with('category')->find($id);
        return $post;
    }
                                                                                            

    //** Ejemplo muxos a mxos Order Sofy */
    // public function insert(Request $request)
    // {
    // try {
    //     $body = $request->validate([
    //         'text'=>'required|string',
    //         'image_path'=> 'required|string',
    //     ]);
    //     $body['user_id'] = Auth::id();
    //     $categories=$body['category_id'];
    //     unset($body['category_id']);
    //     $post= Post::create($body);
    //     $post->categories()->attach($categories);
    //     return response($post,201);
    // } catch (\Exception $e) {
    //     return response($e,500);
    // }
    // }

    // INSERT POST
    public function insert(Request $request){ 
        $body = $request->all();//req.body
        
        // dump($body);//dump() y dd() son de laravel, var_dump() de php, dd() corta el flujo
        $body['user_id'] = Auth::id();
        
        $post = Post::create($body);
        return response($post, 201);
    }

    // UPDATE
    public function update(Request $request, $id){
        $post = Post::find($id);
        $post->update($request->all());
        return $post;
    }

    // DESTROY
    public function destroy($id){
        $post = Post::find($id);
        if (Auth::id() !== $post->user_id){
            return response([
                'message' => 'Wrong Credentials'
            ], 400);
        }
        $post->delete();
        return response([
            'message' => 'Borrado correctamente'
        ], 200);
    }


    // SUBIR IMAGEN
    // public function uploadImage(Request $request, $id)
    // {
    //     try {
    //         $request->validate(['img' => 'required|image']);
    //         // $request->validate(['imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
    //         $user = User::find($id);//buscamos el producto a actualizar la ruta de la imagen
    //         $imageName = time() . '-' . request()->img->getClientOriginalName();//time() es como Date.now()
    //         request()->img->move('images/profile', $imageName);//mueve el archivo subido al directorio indicado (en este caso public path es dentro de la carpeta public)
    //         $user->update(['image_path' => $imageName]);//actualizamos el image_path con el nuevo nombre de la imagen
    //         return response($user);
    //     } catch (\Exception $e) {
    //         return response([
    //             'error' => $e,
    //         ], 500);
    //     }
    // }
    
    // GET POST BY TITLE
    public function getPostByTitle($title)
    {                                                 
        $filter = Post::where('title','LIKE','%'.$title.'%')->get();
        return $filter;
    }

    // ORDER POST DESC
    public function orderPostDesc()
    {           
        $filter = Post::orderBy('id', 'DESC')->get();                                      
        return $filter;
    }
}
