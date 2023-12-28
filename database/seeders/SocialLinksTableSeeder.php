<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialLinksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('social_links')->delete();
        
        \DB::table('social_links')->insert(array (
            0 => 
            array (
                'id' => 1,
                'icon' => 'fab fa-facebook-f',
                'link' => '#',
                'on_header' => 1,
                'on_footer' => 1,
                'created_at' => '2022-03-27 17:35:13',
                'updated_at' => '2022-03-27 17:35:13',
            ),
            1 => 
            array (
                'id' => 2,
                'icon' => 'fab fa-twitter',
                'link' => '#',
                'on_header' => 1,
                'on_footer' => 1,
                'created_at' => '2022-03-27 17:35:53',
                'updated_at' => '2022-03-27 17:35:53',
            ),
            2 => 
            array (
                'id' => 3,
                'icon' => 'fab fa-youtube',
                'link' => '#',
                'on_header' => 1,
                'on_footer' => 1,
                'created_at' => '2022-03-27 17:36:23',
                'updated_at' => '2022-03-27 17:36:23',
            ),
        ));
        
        
    }
}