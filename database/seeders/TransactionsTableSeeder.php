<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transactions')->delete();
        
        \DB::table('transactions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'order_id' => 1,
                'payment_method' => 'Bank',
                'transaction_id' => 'N/A',
                'user_id' => 1,
                'amount' => 5870.0,
                'currency' => 'USD',
                'created_at' => '2022-03-31 05:46:22',
                'updated_at' => '2022-03-31 05:46:22',
            ),
            1 => 
            array (
                'id' => 2,
                'order_id' => 2,
                'payment_method' => 'Bank',
                'transaction_id' => 'N/A',
                'user_id' => 1,
                'amount' => 823.96,
                'currency' => 'USD',
                'created_at' => '2022-03-31 05:47:44',
                'updated_at' => '2022-03-31 05:47:44',
            ),
            2 => 
            array (
                'id' => 3,
                'order_id' => 3,
                'payment_method' => 'Bank',
                'transaction_id' => 'N/A',
                'user_id' => 1,
                'amount' => 1187.08,
                'currency' => 'USD',
                'created_at' => '2022-03-31 05:49:16',
                'updated_at' => '2022-03-31 05:49:16',
            ),
            3 => 
            array (
                'id' => 4,
                'order_id' => 4,
                'payment_method' => 'Bank',
                'transaction_id' => 'N/A',
                'user_id' => 1,
                'amount' => 373.12,
                'currency' => 'USD',
                'created_at' => '2022-03-31 05:57:21',
                'updated_at' => '2022-03-31 05:57:21',
            ),
            4 => 
            array (
                'id' => 5,
                'order_id' => 5,
                'payment_method' => 'Bank',
                'transaction_id' => 'N/A',
                'user_id' => 1,
                'amount' => 2512.06,
                'currency' => 'USD',
                'created_at' => '2022-03-31 05:58:30',
                'updated_at' => '2022-03-31 05:58:30',
            ),
            5 => 
            array (
                'id' => 6,
                'order_id' => 6,
                'payment_method' => 'Bank',
                'transaction_id' => 'N/A',
                'user_id' => 1,
                'amount' => 2020.42,
                'currency' => 'USD',
                'created_at' => '2022-03-31 05:59:38',
                'updated_at' => '2022-03-31 05:59:38',
            ),
        ));
        
        
    }
}