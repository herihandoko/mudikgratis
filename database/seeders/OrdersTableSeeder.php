<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('orders')->delete();
        
        \DB::table('orders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'status' => 'shipping',
                'bank_info' => 'Bank Account Information',
                'shipping_fee' => 0,
                'tax' => 0.0,
                'total_amount' => 5870.0,
                'created_at' => '2022-03-31 05:46:22',
                'updated_at' => '2022-03-31 06:00:30',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'status' => 'completed',
                'bank_info' => 'Bank Account Information',
                'shipping_fee' => 10,
                'tax' => 15.96,
                'total_amount' => 823.96,
                'created_at' => '2022-03-31 05:47:44',
                'updated_at' => '2022-03-31 06:00:50',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'status' => 'pending',
                'bank_info' => 'Bank Account Information',
                'shipping_fee' => 10,
                'tax' => 23.08,
                'total_amount' => 1187.08,
                'created_at' => '2022-03-31 05:49:16',
                'updated_at' => '2022-03-31 05:49:16',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 1,
                'status' => 'pending',
                'bank_info' => 'Bank Account Information',
                'shipping_fee' => 10,
                'tax' => 7.12,
                'total_amount' => 373.12,
                'created_at' => '2022-03-31 05:57:21',
                'updated_at' => '2022-03-31 05:57:21',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 1,
                'status' => 'shipping',
                'bank_info' => NULL,
                'shipping_fee' => 10,
                'tax' => 49.06,
                'total_amount' => 2512.06,
                'created_at' => '2022-03-31 05:58:30',
                'updated_at' => '2022-03-31 06:01:23',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 1,
                'status' => 'pending',
                'bank_info' => 'Bank Account Information',
                'shipping_fee' => 10,
                'tax' => 39.42,
                'total_amount' => 2020.42,
                'created_at' => '2022-03-31 05:59:38',
                'updated_at' => '2022-03-31 05:59:38',
            ),
        ));
        
        
    }
}