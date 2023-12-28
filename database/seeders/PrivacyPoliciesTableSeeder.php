<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrivacyPoliciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('privacy_policies')->delete();
        
        \DB::table('privacy_policies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'content' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                'created_at' => '2022-03-28 06:26:43',
                'updated_at' => '2022-04-27 14:33:00',
            ),
        ));
        
        
    }
}