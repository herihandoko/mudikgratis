<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserAdressesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_adresses')->delete();
        
        \DB::table('user_adresses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'country' => 'United States',
                'city' => 'California',
                'post_code' => '231',
                'address' => 'Usa, California',
                'created_at' => '2022-03-28 19:55:34',
                'updated_at' => '2022-04-27 22:19:39',
            ),
        ));
        
        
    }
}