<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageHeadersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('page_headers')->delete();
        
        \DB::table('page_headers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Light Header One',
                'header' => 'frontend.layouts.menus.menuStyleOne',
                'image' => '/assets/admin/images/menu/menu_style_one.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dark Header One',
                'header' => 'frontend.layouts.menus.menuStyleTwo',
                'image' => '/assets/admin/images/menu/menu_style_two.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Dark Header Two',
                'header' => 'frontend.layouts.menus.menuStyleThree',
                'image' => '/assets/admin/images/menu/menu_style_three.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}