<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_categories')->delete();
        
        \DB::table('product_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'T-Shirt',
                'created_at' => '2022-03-28 06:15:27',
                'updated_at' => '2022-03-28 06:15:27',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Watch',
                'created_at' => '2022-03-28 06:15:39',
                'updated_at' => '2022-03-28 06:15:39',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Shoe',
                'created_at' => '2022-03-28 06:15:48',
                'updated_at' => '2022-03-28 06:15:48',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Pants',
                'created_at' => '2022-03-28 06:16:01',
                'updated_at' => '2022-03-28 06:16:01',
            ),
        ));
        
        
    }
}