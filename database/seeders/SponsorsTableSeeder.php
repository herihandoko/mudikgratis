<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SponsorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sponsors')->delete();
        
        \DB::table('sponsors')->insert(array (
            0 => 
            array (
                'id' => 3,
                'name' => 'Eve Sharpe',
                'image' => 'assets/uploads/images/media_1649917020.jpg',
                'created_at' => '2022-04-14 06:18:35',
                'updated_at' => '2022-04-14 06:20:13',
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'Palmer Charles',
                'image' => 'assets/uploads/images/media_1649917045.jpg',
                'created_at' => '2022-04-14 06:19:51',
                'updated_at' => '2022-04-14 06:19:51',
            ),
            2 => 
            array (
                'id' => 5,
                'name' => 'Jason Obrien',
                'image' => 'assets/uploads/images/media_1649917325.jpg',
                'created_at' => '2022-04-14 06:22:08',
                'updated_at' => '2022-04-14 06:22:08',
            ),
            3 => 
            array (
                'id' => 6,
                'name' => 'Jordan Nunez',
                'image' => 'assets/uploads/images/media_1649917359.jpg',
                'created_at' => '2022-04-14 06:22:42',
                'updated_at' => '2022-04-14 06:22:42',
            ),
        ));
        
        
    }
}