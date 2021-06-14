<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name'=>"cody tanaka",
                'email'=>"codytanaka@ymail.com",
                'password'=>"123456"
                ]
            ]);
    }
}
