# GH-Proyecto3-RedSocial-Backend 

BackEnd del tercer proyecto del Bootcamp FullStack de GeeksHubs de una Red Social clone de Pinterest
React(Redux) / PHP(Laravel)

## Table of Content

- [Built With](##-Built-With)
- [Knowledge](##-Knowledge)
- [Getting Started](##-Getting-Started)
- [Partes API](##-Partes-API)
- [Documentation](##-Documentation)
- [Author](##-Author)
- [Base de Datos](##-Author)


## Built With 🛠️

* PHP
* Laravel
* Eloquent

Otros
* Postman
* Trello


## Knowledge 🧠 

* Uso sintaxis PHP


## Getting Started 🚀 

### Clonando repositorio

```js
git clone https://github.com/FerrowRafael/GH-Proyecto2-RedSocial-Backend
```


### Comenzando proyecto Laravel

Instalamos Composer en el ordenador para poder ejecutar los siguientes comandos

```js
composer create-project --prefer-dist laravel/laravel blog

php artisan serve

npm start
```


### Configuración 

Creando modelo 
```js
php artisan make:model Flight
```

Creando migración
```js
php artisan make:migration create_users_table
```

Creando modelo y migración
```js
php artisan make:model Todo -mcr
```

Migrando modelos a DB
```js
php artisan migrate
```

Creando semilla
```js
php artisan make:seeder UserSeeder
```

Migrando semilla a DB
```js
php artisan db:seed
```


### Arrancar el servidor

Para arrancar el servidor tienes que introducir el comando:

```js
npm start
```

## Partes API 🗄 #Partes-API

- Controllers
- Models
- Migrations
- Routes
- Seeds


### Controllers

Mis controllers son: 

- Category
- Comment
- Likes
- Post
- User

Ejemplo: PostController.php
```js
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
```


### Models

- Category
- Comment
- Likes
- Post
- User

Ejemplo: PostController.php
```js
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'title',
        'text',
        'image_path',
        'user_id',
        'category_id'
    ];
    public function user()
    {
       return $this->belongsTo('\App\User');
    }
    public function category()
    {
        return $this->belongsTo('\App\Category');
    }
    public function likes()
    {
        return $this->belongsToMany('App\User', 'likes');
    }
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
}
```

### Migrations

- Category
- Comment
- Likes
- Post
- User

```js
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->string('image_path')->nullable();
            $table->integer('user_id');
            $table->integer('category_id');
            $table->timestamps();
        });
    }
                                                            
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
```


### Routes

Las rutas al utilizar Laravel como API usamos la parte de api.php

- Category
- Comment
- Likes
- Post
- User

```js
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
```

## Documentation 📚 

- [PHP](https://www.php.net/)
- [Laravel](https://laravel.com/)


## Author 👨🏼‍💻 

* **Rafael Fernández Gómez** - [FerrowRafael](https://github.com/FerrowRafael)


## Base de datos 

Inicio
<a href="https://github.com/FerrowRafael/GH-Proyecto2-RedSocial-Frontend"><img src="GH-Proyecto2-RedSocial-Backend\redsocial\public\images\DB.jpg" alt="Inicio"></a>

