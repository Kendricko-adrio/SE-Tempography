<?php

use Illuminate\Database\Seeder;
use App\photo;


class photosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        photo::insert([
            [
                'user_id'=>"1",
                'PhotoName'=>"Mountain sandes",
                'PhotoURL'=>"image/photo1.png",
                'PhotoDescription'=>"simple photo 1",
                'PhotoPrice'=>20000
            ],
            [
                'user_id'=>"1",
                'PhotoName'=>"Men mind",
                'PhotoURL'=>"image/photo2.jpg",
                'PhotoDescription'=>"simple photo 2",
                'PhotoPrice'=>40000 
            ],
            [
                'user_id'=>"1",
                'PhotoName'=>"Girl barn sit",
                'PhotoURL'=>"image/photo3.jpeg",
                'PhotoDescription'=>"simple photo 3",
                'PhotoPrice'=>50000 
            ],
            [
                'user_id'=>"1",
                'PhotoName'=>"Girl took photo",
                'PhotoURL'=>"image/photo4.jpg",
                'PhotoDescription'=>"simple photo 4",
                'PhotoPrice'=>20000
            ],
            [
                'user_id'=>"1",
                'PhotoName'=>"Men mind",
                'PhotoURL'=>"image/photo5.jpg",
                'PhotoDescription'=>"simple photo 5",
                'PhotoPrice'=>40000 
            ],
            [
                'user_id'=>"1",
                'PhotoName'=>"Girl barn sit",
                'PhotoURL'=>"image/photo6.jpg",
                'PhotoDescription'=>"simple photo 6",
                'PhotoPrice'=>50000 
            ]
            ]);
    }
}
