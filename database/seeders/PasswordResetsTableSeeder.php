<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PasswordResetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('password_resets')->delete();
        
        \DB::table('password_resets')->insert(array (
            0 => 
            array (
                'email' => 'user@gmail.com',
                'token' => 'AUn0btogstPwfkaOf2ak3BNddoehFTngKEu1Yri9abTOA2Mig8FKHOtcXKEgMuxB',
                'created_at' => '2022-05-05 13:45:54',
            ),
            1 => 
            array (
                'email' => 'Info@example.com',
                'token' => '69GVuaX2P960u9gl8ntivLDaw5nIY9TxB7uJ2o5GwenN3rYFXHIwlBoEVnGQS6r7',
                'created_at' => '2022-05-05 13:48:16',
            ),
            2 => 
            array (
                'email' => 'admin@admin.com',
                'token' => 'WaBsSg5BKR6afTFbYFLTI6X3Ti2r8GUZo2G4ZDifSOInf9octTxzMca4TIUs8ryi',
                'created_at' => '2022-05-05 13:54:27',
            ),
            3 => 
            array (
                'email' => 'usser@gmail.com',
                'token' => 'pd9BS6b7n77dKAsT0qAAH9BfnEOPPTD8jLnKqEyNs5Piba3yWdXvPenw5Ab6fBGy',
                'created_at' => '2022-05-07 04:12:11',
            ),
        ));
        
        
    }
}