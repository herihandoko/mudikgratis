<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GoogleRecaptchasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('google_recaptchas')->delete();
        
        \DB::table('google_recaptchas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'recaptcha_site_key' => '6LdqGNseAAAAAHMsrzPzNOqYZwACD_VpBeF85SY4',
                'recaptcha_secret_key' => '6LdqGNseAAAAAIc47i2gAYdh2QCllvIt89aOT2Mn',
                'recaptcha_status' => 0,
                'created_at' => NULL,
                'updated_at' => '2022-04-15 10:15:34',
            ),
        ));
        
        
    }
}