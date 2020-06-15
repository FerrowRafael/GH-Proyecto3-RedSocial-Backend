<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;
// use Illuminate\Support\Facades\Log;

class PostController extends Controller
{

    // GET POSTS ALL 
    public function getAll(){ 
        $posts = Post::with('user', 'category', 'comment.user', 'likes')->get();
        return $posts;;
    }

    // GET POST BY ID
    public function getById($id){ 

        $post = Post::with('user', 'category', 'comment.user', 'likes')->find($id);
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
    // public function insert(Request $request){ 
    //     $body = $request->all();
    //     $body['user_id'] = Auth::id();
        
    //     $post = Post::create($body);
    //     return response($post, 201);
    // }

    // UPDATE POST
    public function update(Request $request, $id){
        $post = Post::find($id);
        if (Auth::id() !== $post->user_id){
            $post->update($request->all());
            return response([
                'message' => 'Wrong Credentials'
            ], 400,);
            return $post;
        }

        return response([
            'message' => 'Post modificado correctamente'
        ], 200);
    }

    // DELETE POST
    public function destroy($id){
        $post = Post::find($id);
        if (Auth::id() !== $post->user_id){
            return response([
                'message' => 'Wrong Credentials'
            ], 400);
        }
        // $post->delete();
        return response([
            'message' => 'Borrado correctamente'
        ], 200);
    }

    public function insertImage (Request $request){
        $name = $request->nome;
        $image = $request->file;
        /*remove special characters and spaces*/
        $name = preg_replace("/[^A-Za-z0-9]/", "", $name);
        $nowTIME = Carbon::now();
        if($name == NULL || $duracao_maxima == NULL){
        return response()->json("Error!");
        }else{
        $material_array = [];
        $namefile = '_'.time().'.png';
        $destinationPath = public_path('product_images') . '/'.$namefile;
        if(file_put_contents($destinationPath, file_get_contents($image))){
        // echo 'Uploaded file';
        }else{
        echo "Unable to save the file.";
        }
        /*Destination file path*/
        /*file:///C:/Users/Name/Desktop/App/public/product_images/1514982145*/
        //$image = $request->get('file');
        /*try{
        $image->move($destinationPath, $namefile);
        }catch(\Exception $e ){
        return $e->getMessage();
        }*/
        // Start transaction!
        DB::beginTransaction();
        try{
        $material_array[0] = [
        'filepath' => $namefile,
        ];
        Material::insert($material_array);
        DB::commit();
        return response()->json('1');
        } catch (\Exception $e) {
        DB::rollback();
        Log::error($e->getMessage());
        return response()->json($e->getMessage());
        }
        }
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
    public function getPostByTitle($title){                                                 
        $filter = Post::where('title','LIKE','%'.$title.'%')->get();
        return $filter;
    }

    // ORDER POST DESC
    public function orderPostDesc(){           
        $filter = Post::orderBy('id', 'DESC')->get();                                      
        return $filter;
    }

    public function insert(Request $request){
        try {
            $body = $request->validate([
                'title' => 'required|string',
                'text' => 'required|string',
                'image_path' => 'required|image',
                'category_id'=>'required'
            ]);
            $imageName = time() . '-' . request()->image_path->getClientOriginalName(); //time() es como Date.now()
            request()->image_path->move('images/posts', $imageName); //mueve el archivo subido al directorio indicado (en este caso public path es dentro de la carpeta public)
            $body['image_path'] = $imageName;
            $body['user_id'] = Auth::id();
            $product = Post::create($body);
        } catch (\Exception $e) {
            return response($e,500);
        }
        return response($product, 201);
    }
}
