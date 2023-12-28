<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubscribersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('subscribers')->delete();
        
        \DB::table('subscribers')->insert(array (
            0 => 
            array (
                'id' => 4,
                'email' => 'iammashikur@gmail.com',
                'is_confirmed' => '1',
                'created_at' => '2022-05-05 13:44:19',
                'updated_at' => '2022-05-05 13:46:11',
            ),
            1 => 
            array (
                'id' => 5,
                'email' => 'user@gmail.com',
                'is_confirmed' => '0',
                'created_at' => '2022-05-05 13:45:54',
                'updated_at' => '2022-05-05 13:45:54',
            ),
            2 => 
            array (
                'id' => 6,
                'email' => 'Info@example.com',
                'is_confirmed' => '0',
                'created_at' => '2022-05-05 13:48:16',
                'updated_at' => '2022-05-05 13:48:16',
            ),
            3 => 
            array (
                'id' => 7,
                'email' => 'admin@admin.com',
                'is_confirmed' => '0',
                'created_at' => '2022-05-05 13:54:27',
                'updated_at' => '2022-05-05 13:54:27',
            ),
            4 => 
            array (
                'id' => 8,
                'email' => 'admin@gmail.com',
                'is_confirmed' => '1',
                'created_at' => '2022-05-05 13:54:41',
                'updated_at' => '2022-05-05 13:55:32',
            ),
            5 => 
            array (
                'id' => 9,
                'email' => 'Info@exasmple.com',
                'is_confirmed' => '1',
                'created_at' => '2022-05-05 14:24:05',
                'updated_at' => '2022-05-05 14:24:25',
            ),
            6 => 
            array (
                'id' => 10,
                'email' => 'iasssmmashikur@gmail.com',
                'is_confirmed' => '1',
                'created_at' => '2022-05-05 14:35:54',
                'updated_at' => '2022-05-05 14:36:19',
            ),
            7 => 
            array (
                'id' => 11,
                'email' => 'usser@gmail.com',
                'is_confirmed' => '0',
                'created_at' => '2022-05-07 04:12:11',
                'updated_at' => '2022-05-07 04:12:11',
            ),
        ));
        
        
    }
}