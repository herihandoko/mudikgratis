<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShopServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('shop_services')->delete();
        
        \DB::table('shop_services')->insert(array (
            0 => 
            array (
                'id' => 1,
                'icon' => 'fas fa-truck',
                'title' => 'Free Shipping',
                'subtitle' => 'All Order Free',
                'created_at' => '2022-03-28 06:11:33',
                'updated_at' => '2022-03-28 06:11:33',
            ),
            1 => 
            array (
                'id' => 2,
                'icon' => 'fas fa-headset',
                'title' => 'Support 24/7',
                'subtitle' => 'Call +01 2345 6789',
                'created_at' => '2022-03-28 06:12:25',
                'updated_at' => '2022-03-28 06:12:25',
            ),
            2 => 
            array (
                'id' => 3,
                'icon' => 'fas fa-sync',
                'title' => '15 Days Returns',
                'subtitle' => '15 Days Returns',
                'created_at' => '2022-03-28 06:12:53',
                'updated_at' => '2022-03-28 06:14:55',
            ),
            3 => 
            array (
                'id' => 4,
                'icon' => 'fas fa-credit-card',
                'title' => 'Secure Checkout',
                'subtitle' => 'Fastest Payment',
                'created_at' => '2022-03-28 06:13:41',
                'updated_at' => '2022-03-28 06:14:40',
            ),
        ));
        
        
    }
}