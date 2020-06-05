<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' =>'Name1',
                'surname' =>'Surname1',
                'nickname' =>'User1',
                'email' => 'user1@gmail.com',
                'image_path' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1200px-Circle-icons-profile.svg.png',
                'password' => Hash::make('Aa1234567'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' =>'d',
                'surname' =>'d',
                'nickname' =>'Monica',
                'email' => 'monica@gmail.com',
                'image_path' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1200px-Circle-icons-profile.svg.png',
                'password' => Hash::make('Aa1234567'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' =>'f',
                'surname' =>'f',
                'nickname' =>'David',
                'email' => 'david@gmail.com',
                'image_path' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1200px-Circle-icons-profile.svg.png',
                'password' => Hash::make('Aa1234567'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' =>'r',
                'surname' =>'r',
                'nickname' =>'John',
                'email' => 'john@gmail.com',
                'image_path' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1200px-Circle-icons-profile.svg.png',
                'password' => Hash::make('Aa1234567'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
