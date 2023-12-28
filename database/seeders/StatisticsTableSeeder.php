<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatisticsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('statistics')->delete();
        
        \DB::table('statistics')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Growing Statistics',
                'subtitle' => 'Our Business Complete',
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam</p>',
                'image' => 'assets/uploads/images/media_1648401203.jpg',
                'created_at' => '2022-03-27 17:15:20',
                'updated_at' => '2022-04-27 14:33:53',
            ),
        ));
        
        
    }
}