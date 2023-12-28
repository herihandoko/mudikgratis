<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageFootersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('page_footers')->delete();
        
        \DB::table('page_footers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Light',
                'footer' => 'frontend.layouts.footers.footerStyleOne',
                'image' => '/assets/admin/images/footer/footer_style_one.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dark ',
                'footer' => 'frontend.layouts.footers.footerStyleTwo',
                'image' => '/assets/admin/images/footer/footer_style_two.png',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}