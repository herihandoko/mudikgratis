<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sliders')->delete();
        
        \DB::table('sliders')->insert(array (
            0 => 
            array (
                'id' => 3,
                'title' => 'Welcome to Consultancy Agency',
                'subtitle' => 'We Promote & Grow Your Business',
                'image' => 'assets/uploads/images/media_1648399895.jpg',
                'button' => 'Discover More',
                'button_link' => '#',
                'created_at' => '2022-03-27 16:52:22',
                'updated_at' => '2022-03-27 16:53:15',
            ),
            1 => 
            array (
                'id' => 4,
                'title' => 'Welcome to Consultancy Agency',
                'subtitle' => 'We’re Shapping the Business Future',
                'image' => 'assets/uploads/images/media_1648400066.jpg',
                'button' => 'Discover More',
                'button_link' => '#',
                'created_at' => '2022-03-27 16:54:30',
                'updated_at' => '2022-03-27 16:54:30',
            ),
        ));
        
        
    }
}