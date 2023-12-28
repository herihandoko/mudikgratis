<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatisticItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('statistic_items')->delete();
        
        \DB::table('statistic_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => '800',
                'subtitle' => 'Project Completed',
                'icon' => 'fas fa-project-diagram',
                'created_at' => '2022-03-27 17:19:27',
                'updated_at' => '2022-03-27 17:19:55',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => '400',
                'subtitle' => 'Expert Consultant',
                'icon' => 'fas fa-user-tie',
                'created_at' => '2022-03-27 17:21:04',
                'updated_at' => '2022-03-27 17:21:04',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => '600',
                'subtitle' => 'Business Strategies',
                'icon' => 'fas fa-rocket',
                'created_at' => '2022-03-27 17:21:37',
                'updated_at' => '2022-03-27 17:21:37',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => '2000',
                'subtitle' => 'Happy Customers',
                'icon' => 'far fa-smile',
                'created_at' => '2022-03-27 17:22:07',
                'updated_at' => '2022-03-27 17:22:07',
            ),
        ));
        
        
    }
}