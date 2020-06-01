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
            ]
        ]);
    }
}
