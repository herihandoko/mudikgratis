<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShopSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('shop_settings')->delete();
        
        \DB::table('shop_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'default_shipping_fee' => 10,
                'tax' => 2,
                'status' => 1,
                'created_at' => '2022-03-27 17:42:48',
                'updated_at' => '2022-03-31 05:47:03',
            ),
        ));
        
        
    }
}