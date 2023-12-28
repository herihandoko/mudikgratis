<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IntrosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('intros')->delete();
        
        \DB::table('intros')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'We Ensure Quality Services for Our Clients',
                'subtitle' => 'We’re Consulting Agency',
                'description' => 'There are many variations of passages. Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.',
                'why_choose_us_icon' => 'fas fa-hands-helping',
                'why_choose_us_title' => 'Most of the people choose Consilt',
                'why_choose_us_description' => 'If you are going to use a passage have suffered alteration in some form.',
                'background' => 'assets/uploads/images/media_1648400907.jpg',
                'contact_title' => 'Professional Consultants',
                'contact_subtitle' => 'Ready to help',
                'contact_number' => '888 222 0000',
                'button_text' => 'Discover More',
                'button_link' => '#',
                'item_one_title' => 'Professional Consultants',
                'item_one_description' => 'Lorem ipsum dolor is not sit amet consectetur notted.',
                'item_two_title' => 'Quality Service Provider',
                'item_two_description' => 'Lorem ipsum dolor is not sit amet consectetur notted.',
                'created_at' => '2022-03-27 17:02:31',
                'updated_at' => '2022-03-27 17:08:32',
            ),
        ));
        
        
    }
}