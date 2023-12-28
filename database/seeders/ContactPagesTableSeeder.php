<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactPagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contact_pages')->delete();
        
        \DB::table('contact_pages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'form_title' => 'Lorem Ipsum has',
                'form_subtitle' => 'Contrary to popular belief',
                'contact_title' => 'There are many variations',
                'contact_subtitle' => 'If you are going to use a passage',
                'phone' => '+440-98-5298',
                'email' => 'info@example.com',
                'address' => '121 King Street, Melbourne',
                'created_at' => '2022-04-03 07:04:57',
                'updated_at' => '2022-04-03 07:06:22',
            ),
        ));
        
        
    }
}