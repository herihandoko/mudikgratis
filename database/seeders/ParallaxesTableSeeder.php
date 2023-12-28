<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ParallaxesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('parallaxes')->delete();
        
        \DB::table('parallaxes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'icon' => 'fas fa-rocket',
                'title' => 'Various versions have evolved over the years',
                'image' => 'assets/uploads/images/media_1648451006.jpg',
                'created_at' => '2022-03-28 07:03:30',
                'updated_at' => '2022-03-28 07:03:30',
            ),
        ));
        
        
    }
}