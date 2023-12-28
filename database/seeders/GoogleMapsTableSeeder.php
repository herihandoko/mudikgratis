<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GoogleMapsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('google_maps')->delete();
        
        \DB::table('google_maps')->insert(array (
            0 => 
            array (
                'id' => 1,
                'link' => 'https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed',
                'created_at' => '2022-01-11 13:39:00',
                'updated_at' => '2022-01-11 11:33:13',
            ),
        ));
        
        
    }
}