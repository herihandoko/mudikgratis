<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GoogleAnalyticsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('google_analytics')->delete();
        
        \DB::table('google_analytics')->insert(array (
            0 => 
            array (
                'id' => 1,
                'google_analytics_id' => 'google_analytics_id',
                'google_analytics_status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}