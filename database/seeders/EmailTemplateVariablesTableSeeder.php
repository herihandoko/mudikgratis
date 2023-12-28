<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmailTemplateVariablesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('email_template_variables')->delete();
        
        \DB::table('email_template_variables')->insert(array (
            0 => 
            array (
                'id' => 1,
                'variable' => '{link}',
                'meaning' => 'Verification Link',
                'template_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'variable' => '{name}',
                'meaning' => 'Customer Name',
                'template_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'variable' => '{name}',
                'meaning' => 'Customer Name',
                'template_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'variable' => '{website}',
                'meaning' => 'Website Name',
                'template_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'variable' => '{name}',
                'meaning' => 'Name',
                'template_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'variable' => '{Phone}',
                'meaning' => 'Phone',
                'template_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'variable' => '{email}',
                'meaning' => 'Email',
                'template_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'variable' => '{subject}',
                'meaning' => 'Subject',
                'template_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'variable' => '{message}',
                'meaning' => 'Message',
                'template_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'variable' => '{website}',
                'meaning' => 'Website Name',
                'template_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}