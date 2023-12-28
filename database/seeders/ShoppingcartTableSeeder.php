<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShoppingcartTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('shoppingcart')->delete();
        
        
        
    }
}