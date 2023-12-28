<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blog_categories')->delete();
        
        \DB::table('blog_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Technology',
                'slug' => 'technology',
                'created_at' => '2022-03-27 13:22:04',
                'updated_at' => '2022-03-27 13:22:04',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Business',
                'slug' => 'business',
                'created_at' => '2022-03-27 13:33:18',
                'updated_at' => '2022-03-27 13:33:18',
            ),
        ));
        
        
    }
}