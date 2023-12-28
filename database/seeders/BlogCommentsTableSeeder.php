<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogCommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blog_comments')->delete();
        
        \DB::table('blog_comments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'blog_id' => 1,
                'status' => 0,
                'name' => 'Lacota Wade',
                'email' => 'ryroq@mailinator.com',
            'phone' => '+1 (555) 352-4754',
                'comment' => 'Voluptas officiis vo',
                'created_at' => '2022-03-28 16:41:25',
                'updated_at' => '2022-03-28 16:41:25',
            ),
        ));
        
        
    }
}