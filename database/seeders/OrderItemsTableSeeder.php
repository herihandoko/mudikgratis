<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('order_items')->delete();
        
        \DB::table('order_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'order_id' => 1,
                'item_id' => 7,
                'item_price' => 356,
                'item_qty' => 7,
                'created_at' => '2022-03-31 05:46:22',
                'updated_at' => '2022-03-31 05:46:22',
            ),
            1 => 
            array (
                'id' => 2,
                'order_id' => 1,
                'item_id' => 6,
                'item_price' => 699,
                'item_qty' => 3,
                'created_at' => '2022-03-31 05:46:22',
                'updated_at' => '2022-03-31 05:46:22',
            ),
            2 => 
            array (
                'id' => 3,
                'order_id' => 1,
                'item_id' => 5,
                'item_price' => 427,
                'item_qty' => 3,
                'created_at' => '2022-03-31 05:46:22',
                'updated_at' => '2022-03-31 05:46:22',
            ),
            3 => 
            array (
                'id' => 4,
                'order_id' => 2,
                'item_id' => 8,
                'item_price' => 798,
                'item_qty' => 1,
                'created_at' => '2022-03-31 05:47:44',
                'updated_at' => '2022-03-31 05:47:44',
            ),
            4 => 
            array (
                'id' => 5,
                'order_id' => 3,
                'item_id' => 8,
                'item_price' => 798,
                'item_qty' => 1,
                'created_at' => '2022-03-31 05:49:16',
                'updated_at' => '2022-03-31 05:49:16',
            ),
            5 => 
            array (
                'id' => 6,
                'order_id' => 3,
                'item_id' => 7,
                'item_price' => 356,
                'item_qty' => 1,
                'created_at' => '2022-03-31 05:49:16',
                'updated_at' => '2022-03-31 05:49:16',
            ),
            6 => 
            array (
                'id' => 7,
                'order_id' => 4,
                'item_id' => 7,
                'item_price' => 356,
                'item_qty' => 1,
                'created_at' => '2022-03-31 05:57:21',
                'updated_at' => '2022-03-31 05:57:21',
            ),
            7 => 
            array (
                'id' => 8,
                'order_id' => 5,
                'item_id' => 2,
                'item_price' => 847,
                'item_qty' => 2,
                'created_at' => '2022-03-31 05:58:30',
                'updated_at' => '2022-03-31 05:58:30',
            ),
            8 => 
            array (
                'id' => 9,
                'order_id' => 5,
                'item_id' => 1,
                'item_price' => 759,
                'item_qty' => 1,
                'created_at' => '2022-03-31 05:58:30',
                'updated_at' => '2022-03-31 05:58:30',
            ),
            9 => 
            array (
                'id' => 10,
                'order_id' => 6,
                'item_id' => 8,
                'item_price' => 798,
                'item_qty' => 2,
                'created_at' => '2022-03-31 05:59:38',
                'updated_at' => '2022-03-31 05:59:38',
            ),
            10 => 
            array (
                'id' => 11,
                'order_id' => 6,
                'item_id' => 4,
                'item_price' => 375,
                'item_qty' => 1,
                'created_at' => '2022-03-31 05:59:38',
                'updated_at' => '2022-03-31 05:59:38',
            ),
        ));
        
        
    }
}