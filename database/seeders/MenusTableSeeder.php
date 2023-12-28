<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Home',
                'link' => '',
                'status' => 1,
                'order' => 0,
                'parent_id' => NULL,
                'created_at' => '2022-01-10 09:52:12',
                'updated_at' => '2022-03-01 11:15:13',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Blogs',
                'link' => 'blogs',
                'status' => 1,
                'order' => 2,
                'parent_id' => NULL,
                'created_at' => '2022-03-27 17:40:37',
                'updated_at' => '2022-04-15 10:14:11',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Shop',
                'link' => 'shop',
                'status' => 1,
                'order' => 3,
                'parent_id' => NULL,
                'created_at' => '2022-03-27 17:40:46',
                'updated_at' => '2022-04-15 10:14:11',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'About Us',
                'link' => 'about',
                'status' => 1,
                'order' => 1,
                'parent_id' => NULL,
                'created_at' => '2022-03-28 06:39:49',
                'updated_at' => '2022-04-15 10:14:31',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Contact',
                'link' => 'contact',
                'status' => 1,
                'order' => 5,
                'parent_id' => NULL,
                'created_at' => '2022-03-28 06:40:02',
                'updated_at' => '2022-04-02 16:22:14',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Faq',
                'link' => 'faq',
                'status' => 1,
                'order' => 4,
                'parent_id' => NULL,
                'created_at' => '2022-03-28 06:41:30',
                'updated_at' => '2022-04-15 10:14:11',
            ),
        ));
        
        
    }
}