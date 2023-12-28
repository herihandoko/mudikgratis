<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'guard_name' => 'admin',
                'created_at' => '2022-05-11 12:38:57',
                'updated_at' => '2022-05-11 12:38:57',
            ),
        ));
        
        
    }
}