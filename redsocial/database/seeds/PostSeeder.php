<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title' => 'Proyecto pelotas',
                'text' =>'El espacio, la ultima frontera',
                'image_path' =>'1591394197-Botones.jpg',
                'user_id' => 1,
                'category_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'PHPito',
                'text' =>'Un elefante morado de PHP, i miss you',
                'image_path' =>'1591394291-logo_php-600x600.png',
                'user_id' => 1,
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Logo CSS',
                'text' =>'No hay mucho que decir, solo que es el logo del CSS3',
                'image_path' =>'1591436882-logo-css3-png-4.png',
                'user_id' => 2,
                'category_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                "title" => "Proyecto DietMe",
                "text"=> "Proyecto HTML, CSS, Bootstrap, Javascript",
                "image_path"=> "1591441922-Sin título-1.jpg",
                'user_id' => 3,
                "category_id" => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Logo de REDUX',
                'text' =>'Quien no quiere tener el logo de redux',
                'image_path' =>'1591467080-5848309bcef1014c0b5e4a9a.png',
                'user_id' => 2,
                'category_id' => 11,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Soy un titulo',
                'text' =>'Lorem ipsum dolor sit amet consectetur adipiscing elit laoreet nascetur massa, ad condimentum auctor dis nec praesent nibh curae netus.',
                'image_path' =>'1591523519-600_154269522.jpeg',
                'user_id' => 3,
                'category_id' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Soy un titulo',
                'text' =>'Lorem ipsum dolor sit amet consectetur adipiscing elit laoreet nascetur massa, ad condimentum auctor dis nec praesent nibh curae netus.',
                'image_path' =>'1591526089-Cabecera.jpg',
                'user_id' => 3,
                'category_id' => 13,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Soy un titulo',
                'text' =>'Lorem ipsum dolor sit amet consectetur adipiscing elit laoreet nascetur massa, ad condimentum auctor dis nec praesent nibh curae netus.',
                'image_path' =>'1591527405-IMG_20200117_130307.jpg',
                'user_id' => 4,
                'category_id' => 14,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Soy un titulo',
                'text' =>'Lorem ipsum dolor sit amet consectetur adipiscing elit laoreet nascetur massa, ad condimentum auctor dis nec praesent nibh curae netus.',
                'image_path' =>'1591529700-IMG_20200213_165729.jpg',
                'user_id' => 4,
                'category_id' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Soy un titulo',
                'text' =>'Lorem ipsum dolor sit amet consectetur adipiscing elit laoreet nascetur massa, ad condimentum auctor dis nec praesent nibh curae netus.',
                'image_path' =>'1591547819-Pagina Contacto.jpg',
                'user_id' => 1,
                'category_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Soy un titulo',
                'text' =>'Lorem ipsum dolor sit amet consectetur adipiscing elit laoreet nascetur massa, ad condimentum auctor dis nec praesent nibh curae netus.',
                'image_path' =>'1591564813-Pagina Proyectos.jpg',
                'user_id' => 1,
                'category_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Soy un titulo',
                'text' =>'Lorem ipsum dolor sit amet consectetur adipiscing elit laoreet nascetur massa, ad condimentum auctor dis nec praesent nibh curae netus.',
                'image_path' =>'1591985282-cofigo barra navegacion.jpg',
                'user_id' => 1,
                'category_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Soy un titulo',
                'text' =>'Lorem ipsum dolor sit amet consectetur adipiscing elit laoreet nascetur massa, ad condimentum auctor dis nec praesent nibh curae netus.',
                'image_path' =>'1592005284-Voluntario.jpg',
                'user_id' => 1,
                'category_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Soy un titulo',
                'text' =>'Lorem ipsum dolor sit amet consectetur adipiscing elit laoreet nascetur massa, ad condimentum auctor dis nec praesent nibh curae netus.',
                'image_path' =>'1592040011-Barra de navegacion.jpg',
                'user_id' => 1,
                'category_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
