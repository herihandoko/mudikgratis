<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CookiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cookies')->delete();
        
        \DB::table('cookies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'cookie_status' => '1',
                'cookie_button' => 'Accept',
                'cookie_confirmation' => 'Your experience on this site will be improved by allowing cookies.',
                'created_at' => NULL,
                'updated_at' => '2022-02-15 14:02:37',
            ),
        ));
        
        
    }
}