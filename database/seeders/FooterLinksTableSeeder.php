<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FooterLinksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('footer_links')->delete();
        
        \DB::table('footer_links')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'About',
                'link' => 'about',
                'created_at' => '2022-03-27 17:31:21',
                'updated_at' => '2022-03-31 06:07:59',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Services',
                'link' => 'services',
                'created_at' => '2022-03-27 17:31:36',
                'updated_at' => '2022-03-31 06:07:06',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Latest News',
                'link' => 'blogs',
                'created_at' => '2022-03-27 17:31:58',
                'updated_at' => '2022-03-31 06:07:29',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Questions',
                'link' => 'faq',
                'created_at' => '2022-03-27 17:32:21',
                'updated_at' => '2022-03-31 06:09:35',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Contact Us',
                'link' => 'contact',
                'created_at' => '2022-03-27 17:32:32',
                'updated_at' => '2022-03-31 06:08:12',
            ),
        ));
        
        
    }
}