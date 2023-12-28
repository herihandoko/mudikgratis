<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HeaderContactsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('header_contacts')->delete();
        
        \DB::table('header_contacts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'phone' => '+440-98-5298',
                'email' => 'info@example.com',
                'address' => '121 King Street, Melbourne',
                'created_at' => '2022-03-27 16:59:53',
                'updated_at' => '2022-03-27 16:59:53',
            ),
        ));
        
        
    }
}