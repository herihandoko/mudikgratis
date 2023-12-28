<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('media')->delete();
        
        \DB::table('media')->insert(array (
            0 => 
            array (
                'id' => 1,
                'file_name' => 'Blog 1',
                'file_path' => 'assets/uploads/images/media_1648387055.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'file_name' => 'Blog2',
                'file_path' => 'assets/uploads/images/media_1648387064.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'file_name' => 'Blog 3',
                'file_path' => 'assets/uploads/images/media_1648387073.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'file_name' => 'Blog 4',
                'file_path' => 'assets/uploads/images/media_1648387082.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'file_name' => 'Blog 5',
                'file_path' => 'assets/uploads/images/media_1648387104.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'file_name' => 'Blog 6',
                'file_path' => 'assets/uploads/images/media_1648387142.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'file_name' => 'Blog 7',
                'file_path' => 'assets/uploads/images/media_1648387173.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'file_name' => 'Blog 8',
                'file_path' => 'assets/uploads/images/media_1648387209.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'file_name' => 'Blog 9',
                'file_path' => 'assets/uploads/images/media_1648394590.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 13,
                'file_name' => 'service 1',
                'file_path' => 'assets/uploads/images/media_1648395345.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 15,
                'file_name' => 'service 3',
                'file_path' => 'assets/uploads/images/media_1648395376.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 16,
                'file_name' => 'service 3',
                'file_path' => 'assets/uploads/images/media_1648395395.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 17,
                'file_name' => 'testimonial',
                'file_path' => 'assets/uploads/images/media_1648395580.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 18,
                'file_name' => 'testimonial',
                'file_path' => 'assets/uploads/images/media_1648395650.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 19,
                'file_name' => 'testimonial',
                'file_path' => 'assets/uploads/images/media_1648395657.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 20,
                'file_name' => 'slider 1',
                'file_path' => 'assets/uploads/images/media_1648399895.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 21,
                'file_name' => 'slider 2',
                'file_path' => 'assets/uploads/images/media_1648400066.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 22,
                'file_name' => 'about',
                'file_path' => 'assets/uploads/images/media_1648400907.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 25,
                'file_name' => 'invato',
                'file_path' => 'assets/uploads/images/media_1648401114.png',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 26,
                'file_name' => 'team',
                'file_path' => 'assets/uploads/images/media_1648401203.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 27,
                'file_name' => 'logo 2',
                'file_path' => 'assets/uploads/images/media_1648402686.png',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 28,
                'file_name' => 'banner',
                'file_path' => 'assets/uploads/images/media_1648403274.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 29,
                'file_name' => 'tshirt',
                'file_path' => 'assets/uploads/images/media_1648403293.png',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 30,
                'file_name' => 'shirt 1',
                'file_path' => 'assets/uploads/images/media_1648448302.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 31,
                'file_name' => 'Shirt 2',
                'file_path' => 'assets/uploads/images/media_1648448315.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 32,
                'file_name' => 'portfolio 1',
                'file_path' => 'assets/uploads/images/media_1648448990.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 33,
                'file_name' => 'portfolio 2',
                'file_path' => 'assets/uploads/images/media_1648449000.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 34,
                'file_name' => 'About',
                'file_path' => 'assets/uploads/images/media_1648449824.png',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 35,
                'file_name' => 'About',
                'file_path' => 'assets/uploads/images/media_1648449889.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 36,
                'file_name' => 'ceo',
                'file_path' => 'assets/uploads/images/media_1648449910.png',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 37,
                'file_name' => 'signature',
                'file_path' => 'assets/uploads/images/media_1648449947.png',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 38,
                'file_name' => 'About',
                'file_path' => 'assets/uploads/images/media_1648449981.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 39,
                'file_name' => 'parallax',
                'file_path' => 'assets/uploads/images/media_1648451006.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 40,
                'file_name' => 'cap',
                'file_path' => 'assets/uploads/images/media_1649260291.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 41,
                'file_name' => 'icon',
                'file_path' => 'assets/uploads/images/media_1649745510.png',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 42,
                'file_name' => 'footer logo',
                'file_path' => 'assets/uploads/images/media_1649745531.png',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 43,
                'file_name' => 'logo',
                'file_path' => 'assets/uploads/images/media_1649916585.png',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 44,
                'file_name' => 'logo 1',
                'file_path' => 'assets/uploads/images/media_1649917020.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 45,
                'file_name' => 'Logo 2',
                'file_path' => 'assets/uploads/images/media_1649917045.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 47,
                'file_name' => 'logo 3',
                'file_path' => 'assets/uploads/images/media_1649917325.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 48,
                'file_name' => 'logo 4',
                'file_path' => 'assets/uploads/images/media_1649917359.jpg',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 49,
                'file_name' => 'Logo',
                'file_path' => 'assets/uploads/images/media_1649917539.png',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 50,
                'file_name' => 'Favicon',
                'file_path' => 'assets/uploads/images/media_1649917636.png',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 51,
                'file_name' => 'Logo Footer',
                'file_path' => 'assets/uploads/images/media_1649917702.png',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 69,
                'file_name' => 'header logo',
                'file_path' => 'assets/uploads/images/media_1650010122.png',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 70,
                'file_name' => 'Footer logo',
                'file_path' => 'assets/uploads/images/media_1650010148.png',
                'file_type' => 'image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}