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
                'name' =>'d',
                'surname' =>'d',
                'nickname' =>'Monica',
                'email' => 'monica@gmail.com',
                'password' => Hash::make('Aa1234567'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' =>'f',
                'surname' =>'f',
                'nickname' =>'David',
                'email' => 'david@gmail.com',
                'password' => Hash::make('Aa1234567'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' =>'r',
                'surname' =>'r',
                'nickname' =>'John',
                'email' => 'john@gmail.com',
                'password' => Hash::make('Aa1234567'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
