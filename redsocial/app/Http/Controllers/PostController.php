<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;
// use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    // GET ALL
    public function getAll()
    { //with es como include o populate()
        $posts = Post::with('user', 'category')->get();
        return $posts;
    }

    // GET BY ID
    public function getById(Request $request, $id)
    { //with es como include o populate()
        $posts = Post::find($id)::with('user', 'category')->get();
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

}
