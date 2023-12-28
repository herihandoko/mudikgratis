<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageBuildersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('page_builders')->delete();
        
        \DB::table('page_builders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'home',
                'slug' => 'home',
                'contents' => '3,4,5,6,7,8,9,10',
                'created_at' => '2022-01-10 09:27:39',
                'updated_at' => '2022-01-10 09:27:39',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Portfolio',
                'slug' => 'portfolio',
                'contents' => '21',
                'created_at' => '2022-03-28 06:35:27',
                'updated_at' => '2022-03-28 06:35:27',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'About',
                'slug' => 'about',
                'contents' => '15,16,17,18',
                'created_at' => '2022-03-28 06:36:42',
                'updated_at' => '2022-03-28 06:36:42',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Faq',
                'slug' => 'faq',
                'contents' => '20',
                'created_at' => '2022-03-28 06:37:27',
                'updated_at' => '2022-03-28 06:37:27',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Privacy policy',
                'slug' => 'privacy-policy',
                'contents' => '22',
                'created_at' => '2022-03-28 06:37:51',
                'updated_at' => '2022-03-28 06:38:03',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Terms of use',
                'slug' => 'terms-of-use',
                'contents' => '23',
                'created_at' => '2022-03-28 06:38:27',
                'updated_at' => '2022-03-28 06:38:27',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Contact',
                'slug' => 'contact',
                'contents' => '24',
                'created_at' => '2022-03-28 06:38:44',
                'updated_at' => '2022-03-28 06:38:44',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Services',
                'slug' => 'services',
                'contents' => '13',
                'created_at' => '2022-03-28 06:39:09',
                'updated_at' => '2022-03-28 06:39:09',
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'saq',
                'slug' => 'saq',
                'contents' => '11',
                'created_at' => '2022-03-31 12:31:50',
                'updated_at' => '2022-03-31 12:31:50',
            ),
        ));
        
        
    }
}