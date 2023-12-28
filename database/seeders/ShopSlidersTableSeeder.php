<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShopSlidersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('shop_sliders')->delete();
        
        \DB::table('shop_sliders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'background' => 'assets/uploads/images/media_1648403274.jpg',
                'foreground' => 'assets/uploads/images/media_1648403293.png',
                'main_heading' => 'Built in Shop Features',
                'sub_heading' => 'Speicial Offer for this season',
                'discount_text' => '25% Discount for all items',
                'button_text' => 'Order Now',
                'button_link' => '#',
                'created_at' => '2022-03-27 17:48:24',
                'updated_at' => '2022-03-27 17:48:24',
            ),
        ));
        
        
    }
}