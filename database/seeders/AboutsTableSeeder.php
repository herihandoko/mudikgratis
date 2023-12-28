<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AboutsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('abouts')->delete();
        
        \DB::table('abouts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'We’re Consulting Agency',
                'subtitle' => 'We Inspire and Help Our Customers',
                'description' => '<p>There are many variations of passages of available but the majority have suffered alteration in some form, by injected humou or randomised words even slightly believable.</p>

<p>&nbsp;</p>

<ul>
<li>Lorem Ipsum is not simply random text</li>
<li>If you are going to use a passage</li>
<li>Making this the first true generator on the Internet</li>
<li>Various versions have evolved over the years</li>
</ul>',
                'bottom_text' => 'Lorem Ipsum is not simply random text',
                'background' => 'assets/uploads/images/media_1648449889.jpg',
                'foreground' => 'assets/uploads/images/media_1648449981.jpg',
                'avatar' => 'assets/uploads/images/media_1648449910.png',
                'signature' => 'assets/uploads/images/media_1648449947.png',
                'created_at' => '2022-03-28 06:45:53',
                'updated_at' => '2022-03-28 07:00:55',
            ),
        ));
        
        
    }
}