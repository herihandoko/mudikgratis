<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderAddressesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('order_addresses')->delete();
        
        \DB::table('order_addresses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'order_id' => 1,
                'user_id' => 1,
                'country' => 'United States',
                'city' => 'Bogura',
                'post_code' => '231',
                'address' => 'Usa, California',
                'created_at' => '2022-03-31 05:46:22',
                'updated_at' => '2022-03-31 05:46:22',
            ),
            1 => 
            array (
                'id' => 2,
                'order_id' => 2,
                'user_id' => 1,
                'country' => 'United States',
                'city' => 'Bogura',
                'post_code' => '231',
                'address' => 'Usa, California',
                'created_at' => '2022-03-31 05:47:44',
                'updated_at' => '2022-03-31 05:47:44',
            ),
            2 => 
            array (
                'id' => 3,
                'order_id' => 3,
                'user_id' => 1,
                'country' => 'United States',
                'city' => 'Bogura',
                'post_code' => '231',
                'address' => 'Usa, California',
                'created_at' => '2022-03-31 05:49:16',
                'updated_at' => '2022-03-31 05:49:16',
            ),
            3 => 
            array (
                'id' => 4,
                'order_id' => 4,
                'user_id' => 1,
                'country' => 'United States',
                'city' => 'Bogura',
                'post_code' => '231',
                'address' => 'Usa, California',
                'created_at' => '2022-03-31 05:57:21',
                'updated_at' => '2022-03-31 05:57:21',
            ),
            4 => 
            array (
                'id' => 5,
                'order_id' => 5,
                'user_id' => 1,
                'country' => 'United States',
                'city' => 'Bogura',
                'post_code' => '231',
                'address' => 'Usa, California',
                'created_at' => '2022-03-31 05:58:30',
                'updated_at' => '2022-03-31 05:58:30',
            ),
            5 => 
            array (
                'id' => 6,
                'order_id' => 6,
                'user_id' => 1,
                'country' => 'United States',
                'city' => 'Bogura',
                'post_code' => '231',
                'address' => 'Usa, California',
                'created_at' => '2022-03-31 05:59:38',
                'updated_at' => '2022-03-31 05:59:38',
            ),
        ));
        
        
    }
}