<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppointmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('appointments')->delete();
        
        \DB::table('appointments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Veda Pope',
                'email' => 'jegicowi@mailinator.com',
            'phone' => '+1 (217) 778-2985',
                'service_id' => 2,
                'appointment_date' => '2011-03-27 06:57:00',
                'status' => 0,
                'message' => 'Quisquam cupiditate',
                'created_at' => '2022-03-31 05:17:25',
                'updated_at' => '2022-03-31 05:17:25',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Aiko Bullock',
                'email' => 'lygorulilu@mailinator.com',
            'phone' => '+1 (619) 125-8528',
                'service_id' => 2,
                'appointment_date' => '2016-11-10 09:09:00',
                'status' => 0,
                'message' => 'Accusantium esse to',
                'created_at' => '2022-03-31 05:34:49',
                'updated_at' => '2022-03-31 05:34:49',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Brock Sosa',
                'email' => 'xamiqaqiv@mailinator.com',
            'phone' => '+1 (396) 472-9031',
                'service_id' => 3,
                'appointment_date' => '1994-08-16 05:04:00',
                'status' => 0,
                'message' => 'In ad exercitation n',
                'created_at' => '2022-03-31 05:35:08',
                'updated_at' => '2022-03-31 05:35:08',
            ),
        ));
        
        
    }
}