<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShopDiscountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('shop_discounts')->delete();
        
        \DB::table('shop_discounts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'image' => 'assets/uploads/images/media_1649260291.jpg',
                'main_heading' => 'New Trendy Products',
                'sub_heading' => 'Big discount!',
                'discount_text' => 'Up to 21% off on all products!',
                'button_text' => 'Shop now',
                'button_link' => '/shop',
                'created_at' => '2022-03-31 05:42:32',
                'updated_at' => '2022-04-06 15:52:31',
            ),
        ));
        
        
    }
}