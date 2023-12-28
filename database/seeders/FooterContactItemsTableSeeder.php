<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FooterContactItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('footer_contact_items')->delete();
        
        \DB::table('footer_contact_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'icon' => 'far fa-envelope-open',
                'name' => 'Email',
                'content' => 'info@example.com',
                'created_at' => '2022-04-14 09:28:18',
                'updated_at' => '2022-04-14 09:28:18',
            ),
            1 => 
            array (
                'id' => 3,
                'icon' => 'fas fa-map-marker-alt',
                'name' => 'Address',
                'content' => '121 King Street, Melbourne',
                'created_at' => '2022-04-14 09:29:25',
                'updated_at' => '2022-04-14 09:30:33',
            ),
        ));
        
        
    }
}