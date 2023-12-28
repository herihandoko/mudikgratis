<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestimonialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('testimonials')->delete();
        
        \DB::table('testimonials')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Dara Camacho',
                'designation' => 'Virginia Marks',
                'image' => 'assets/uploads/images/media_1648395580.jpg',
                'comment' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.',
                'created_at' => '2022-03-27 15:40:11',
                'updated_at' => '2022-03-27 15:40:11',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Sean Duffy',
                'designation' => 'Orli Shepherd',
                'image' => 'assets/uploads/images/media_1648395650.jpg',
                'comment' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.',
                'created_at' => '2022-03-27 15:41:01',
                'updated_at' => '2022-03-27 15:41:10',
            ),
        ));
        
        
    }
}