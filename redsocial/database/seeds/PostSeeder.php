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
                'title' => 'Fiesta',
                'text' =>'Vamonos de fiesta, eso puede ser divertido',
                'image_path' =>'https://www.lavanguardia.com/r/GODO/LV/p7/WebSite/2020/04/17/Recortada/EuropaPress_2775109_mad_cool_festival_20200402191544-k4D-U48574976618FuE-992x558@LaVanguardia-Web.jpg',
                'user_id' => 1,
                'category_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Colorines',
                'text' =>'Muxos colorines chulos, puede ser un buen wallpaper',
                'image_path' =>'https://cdn.trendhunterstatic.com/thumbs/cool-backgrounds.jpeg',
                'user_id' => 1,
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Gato',
                'text' =>'Esto es un dibujo en blanco y negro de un gato que dice MEOW',
                'image_path' =>'https://pm1.narvii.com/6349/1a3f51599cf9ca499a4936b7e82bc90d2be903ef_hq.jpg',
                'user_id' => 2,
                'category_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                "title" => "Juego kawaii",
                "text"=> "Gente muy simpatica cerca del mar",
                "image_path"=> "https://gameranx.com/wp-content/uploads/2019/08/Animal-Crossing-New-Horizons-1080P-Wallpaper-2-1024x576.jpg",
                'user_id' => 3,
                "category_id" => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Chica con flor',
                'text' =>'Una foto bien hecha de una chica con una flor, girasol',
                'image_path' =>'https://pixlr.com/photo/image-editing-20200512-pw.jpg',
                'user_id' => 2,
                'category_id' => 11,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Bart Llorando',
                'text' =>'No se que le pasa pero parece que esta triste',
                'image_path' =>'https://data.whicdn.com/images/307144997/original.jpg?t=1518442689',
                'user_id' => 3,
                'category_id' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Fiesta',
                'text' =>'Vamonos de fiesta, eso puede ser divertido',
                'image_path' =>'https://www.lavanguardia.com/r/GODO/LV/p7/WebSite/2020/04/17/Recortada/EuropaPress_2775109_mad_cool_festival_20200402191544-k4D-U48574976618FuE-992x558@LaVanguardia-Web.jpg',
                'user_id' => 3,
                'category_id' => 13,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Colorines',
                'text' =>'Muxos colorines chulos, puede ser un buen wallpaper',
                'image_path' =>'https://cdn.trendhunterstatic.com/thumbs/cool-backgrounds.jpeg',
                'user_id' => 4,
                'category_id' => 14,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Gato',
                'text' =>'Esto es un dibujo en blanco y negro de un gato que dice MEOW',
                'image_path' =>'https://pm1.narvii.com/6349/1a3f51599cf9ca499a4936b7e82bc90d2be903ef_hq.jpg',
                'user_id' => 4,
                'category_id' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Fiesta',
                'text' =>'Vamonos de fiesta, eso puede ser divertido',
                'image_path' =>'https://www.lavanguardia.com/r/GODO/LV/p7/WebSite/2020/04/17/Recortada/EuropaPress_2775109_mad_cool_festival_20200402191544-k4D-U48574976618FuE-992x558@LaVanguardia-Web.jpg',
                'user_id' => 1,
                'category_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Colorines',
                'text' =>'Muxos colorines chulos, puede ser un buen wallpaper',
                'image_path' =>'https://cdn.trendhunterstatic.com/thumbs/cool-backgrounds.jpeg',
                'user_id' => 1,
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Gato',
                'text' =>'Esto es un dibujo en blanco y negro de un gato que dice MEOW',
                'image_path' =>'https://pm1.narvii.com/6349/1a3f51599cf9ca499a4936b7e82bc90d2be903ef_hq.jpg',
                'user_id' => 2,
                'category_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                "title" => "Juego kawaii",
                "text"=> "Gente muy simpatica cerca del mar",
                "image_path"=> "https://gameranx.com/wp-content/uploads/2019/08/Animal-Crossing-New-Horizons-1080P-Wallpaper-2-1024x576.jpg",
                'user_id' => 3,
                "category_id" => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Chica con flor',
                'text' =>'Una foto bien hecha de una chica con una flor, girasol',
                'image_path' =>'https://pixlr.com/photo/image-editing-20200512-pw.jpg',
                'user_id' => 2,
                'category_id' => 11,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Bart Llorando',
                'text' =>'No se que le pasa pero parece que esta triste',
                'image_path' =>'https://data.whicdn.com/images/307144997/original.jpg?t=1518442689',
                'user_id' => 3,
                'category_id' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Fiesta',
                'text' =>'Vamonos de fiesta, eso puede ser divertido',
                'image_path' =>'https://www.lavanguardia.com/r/GODO/LV/p7/WebSite/2020/04/17/Recortada/EuropaPress_2775109_mad_cool_festival_20200402191544-k4D-U48574976618FuE-992x558@LaVanguardia-Web.jpg',
                'user_id' => 3,
                'category_id' => 13,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Colorines',
                'text' =>'Muxos colorines chulos, puede ser un buen wallpaper',
                'image_path' =>'https://cdn.trendhunterstatic.com/thumbs/cool-backgrounds.jpeg',
                'user_id' => 4,
                'category_id' => 14,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Gato',
                'text' =>'Esto es un dibujo en blanco y negro de un gato que dice MEOW',
                'image_path' =>'https://pm1.narvii.com/6349/1a3f51599cf9ca499a4936b7e82bc90d2be903ef_hq.jpg',
                'user_id' => 4,
                'category_id' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
