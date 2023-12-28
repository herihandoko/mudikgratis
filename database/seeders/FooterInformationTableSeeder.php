<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FooterInformationTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('footer_information')->delete();
        
        \DB::table('footer_information')->insert(array (
            0 => 
            array (
                'id' => 1,
                'about' => 'Lorem ipsum dolor sit amet, consect etur adi pisicing elit sed do eiusmod tempor incididunt ut labore et.',
                'copyright' => '© Copyright 2021 by Websolutionus.com',
                'term_of_use' => 'terms-of-use',
                'privacy_policy' => 'privacy-policy',
                'created_at' => '2022-03-27 17:33:29',
                'updated_at' => '2022-03-31 06:11:16',
            ),
        ));
        
        
    }
}