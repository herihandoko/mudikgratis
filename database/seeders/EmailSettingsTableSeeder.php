<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmailSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('email_settings')->delete();
        
        \DB::table('email_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'mail_host' => 'smtp.mailtrap.io',
                'smtp_username' => '8bc666e4472e5a',
                'smtp_password' => '1ff89a5bf7a1f8',
                'mail_port' => '2525',
                'mail_sent_from' => 'Consilt',
                'mail_sent_from_email' => 'consilt@testmail.com',
                'mail_encryption' => 'tls',
                'created_at' => NULL,
                'updated_at' => '2022-05-05 13:40:24',
            ),
        ));
        
        
    }
}