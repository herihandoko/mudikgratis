<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Jhon Doe',
                'avatar' => 'assets/uploads/images/media_1645360996.jpg',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$Bxh6MB6rPKe/QPJeedAp6u5HXgs3DLLybCtwTs1M318jJri5yjJ3G',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-02-20 15:43:32',
            ),
        ));
        
        
    }
}