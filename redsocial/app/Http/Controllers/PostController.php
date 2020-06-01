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
        $posts = Post::with('user', 'category', 'comment.user', 'like.user')->get();
        return $posts;;
    }

    // GET POST BY ID
    public function getById(Request $request, $id)
    { //with es como include o populate()
        $posts = Post::find($id)::with('category','comment.user', 'likes')->get();
        return $posts;
    }
                                                                                                            
    // // INSERT
    // public function insert(Request $request)
    // {
    //     try {
    //         $categoriesIds = Category::all()->map(function($category) {return $category->id->toArray();}) ;
    //         // $categoriesMapped=$categoriesFiltered->map(fn ($category) =>[
    //         //     'id'=>$category->id,
    //         //     'name'=>$category->name
    //         //     ])->values()->toArray();
    //         // dd($categoriesMapped);
    //         // $numbers =new Collection([[1,2],[[3,4],5,6]]) ;
    //         // dd($numbers->flatten()->sum());
    //         // dump($categoriesIds);
    //         // dump(join(',',$categoriesIds));//transforma arrays en strings definiendo un separador lo mismo join que implode
    //         $body = $request->validate([
    //             'text' => 'required|string|max:40',
    //             'image_path' => 'string',
    //             'categories' => 'required|array|in:' . implode(',', $categoriesIds)
    //         ]);
    //         $body['user_id'] = Auth::id();
    //         $post = Post::create($body);
    //         //const product = await Product.create(req.body)
    //         $post->categories()->attach($body['categories']);
    //         // product.addCategory(req.body.categories)
    //         // $product->categories()->create($body['categories']);
    //         // product.createCategory(req.body.categories)
    //         return response($product->load('categories'), 201);
    //     } catch (\Exception $e) {
    //         return response([
    //             'error' => $e
    //         ], 500);
    //     }
    // }


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


}
