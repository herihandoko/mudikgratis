<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Jhon Doe',
                'avatar' => NULL,
                'email' => 'user@gmail.com',
            'phone' => '(555) 555-1234',
                'email_verified_at' => '2022-03-28 18:40:01',
                'password' => '$2y$10$Bxh6MB6rPKe/QPJeedAp6u5HXgs3DLLybCtwTs1M318jJri5yjJ3G',
                'remember_token' => NULL,
                'created_at' => '2022-03-28 18:40:01',
                'updated_at' => '2022-03-28 18:40:01',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admin@gmail.com',
                'avatar' => NULL,
                'email' => 'iammashi4kur@gmail.com',
                'phone' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$3o2jW3aX25A7A7bmvoMJYOXaZSdorlKOSs0wQo8izjqVR2x0rjM3C',
                'remember_token' => NULL,
                'created_at' => '2022-05-07 03:52:40',
                'updated_at' => '2022-05-07 03:52:40',
            ),
        ));
        
        
    }
}