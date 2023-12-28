<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PortfoliosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('portfolios')->delete();
        
        \DB::table('portfolios')->insert(array (
            0 => 
            array (
                'id' => 1,
                'image' => 'assets/uploads/images/media_1648448990.jpg',
                'title' => 'Amet non assumenda',
                'slug' => 'portfolio-2',
                'description' => '<h2>Where does it come from?</h2>

<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>',
                'client' => 'Enim anim tenetur au',
                'location' => '10-Sep-1984',
                'category' => '08-Aug-2013',
                'start_date' => '1979-03-19 06:24:00',
                'end_date' => '1987-04-04 00:15:00',
                'website' => '27-Jan-1993',
                'created_at' => '2022-03-28 06:30:32',
                'updated_at' => '2022-03-28 06:30:32',
            ),
            1 => 
            array (
                'id' => 2,
                'image' => 'assets/uploads/images/media_1648449000.jpg',
                'title' => 'Perferendis voluptat',
                'slug' => 'Quo reiciendis facil',
                'description' => '<h2>Where does it come from?</h2>

<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>',
                'client' => 'Pariatur Consectetu',
                'location' => '09-Oct-1982',
                'category' => '03-Apr-2013',
                'start_date' => '1985-12-22 17:49:00',
                'end_date' => '2019-12-23 01:06:00',
                'website' => '28-May-1998',
                'created_at' => '2022-03-28 06:31:04',
                'updated_at' => '2022-03-28 06:31:04',
            ),
            2 => 
            array (
                'id' => 3,
                'image' => 'assets/uploads/images/media_1648448990.jpg',
                'title' => 'Ex adipisicing sit',
                'slug' => 'Consequatur volupta',
                'description' => '<h2>Where does it come from?</h2>

<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>',
                'client' => 'Dolores expedita lor',
                'location' => '21-Feb-1994',
                'category' => '02-Jun-2012',
                'start_date' => '1974-02-22 14:54:00',
                'end_date' => '1993-07-14 04:50:00',
                'website' => '04-Oct-1980',
                'created_at' => '2022-03-28 06:31:18',
                'updated_at' => '2022-03-28 06:31:18',
            ),
            3 => 
            array (
                'id' => 4,
                'image' => 'assets/uploads/images/media_1648449000.jpg',
                'title' => 'Quia aut neque irure',
                'slug' => 'Necessitatibus Nam d',
                'description' => '<h2>Where does it come from?</h2>

<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>',
                'client' => 'Maiores aliquam nemo',
                'location' => '28-Feb-1983',
                'category' => '12-Apr-1996',
                'start_date' => '2014-09-12 19:34:00',
                'end_date' => '2022-12-06 03:02:00',
                'website' => '07-Nov-1972',
                'created_at' => '2022-03-28 06:31:36',
                'updated_at' => '2022-03-28 06:31:53',
            ),
            4 => 
            array (
                'id' => 5,
                'image' => 'assets/uploads/images/media_1648448990.jpg',
                'title' => 'Quas nihil at ducimu',
                'slug' => 'Laudantium enim ea',
                'description' => '<h2>Where does it come from?</h2>

<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>',
                'client' => 'Corrupti illo tempo',
                'location' => '07-Feb-2003',
                'category' => '10-Sep-2005',
                'start_date' => '1993-07-26 04:22:00',
                'end_date' => '1974-12-18 12:59:00',
                'website' => '24-May-1984',
                'created_at' => '2022-03-28 06:32:29',
                'updated_at' => '2022-03-28 06:32:29',
            ),
            5 => 
            array (
                'id' => 6,
                'image' => 'assets/uploads/images/media_1648449000.jpg',
                'title' => 'Exercitationem est',
                'slug' => 'Est voluptatem Sol',
                'description' => '<h2>Where does it come from?</h2>

<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>',
                'client' => 'Et quis ducimus omn',
                'location' => '05-Sep-2020',
                'category' => '24-Feb-1991',
                'start_date' => '2005-06-22 23:08:00',
                'end_date' => '2007-03-06 21:59:00',
                'website' => '20-Jun-2002',
                'created_at' => '2022-03-28 06:32:42',
                'updated_at' => '2022-03-28 06:32:42',
            ),
            6 => 
            array (
                'id' => 7,
                'image' => 'assets/uploads/images/media_1648448990.jpg',
                'title' => 'Ut autem sunt ipsam',
                'slug' => 'Dolores corporis rep',
                'description' => '<h2>Where does it come from?</h2>

<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>',
                'client' => 'Id voluptates magna',
                'location' => '02-Apr-2009',
                'category' => '05-Mar-1990',
                'start_date' => '2016-01-25 03:08:00',
                'end_date' => '2009-10-06 19:26:00',
                'website' => '22-May-2017',
                'created_at' => '2022-03-28 06:33:05',
                'updated_at' => '2022-03-28 06:33:05',
            ),
            7 => 
            array (
                'id' => 8,
                'image' => 'assets/uploads/images/media_1648449000.jpg',
                'title' => 'Voluptatum inventore',
                'slug' => 'Cupiditate ut exerci',
                'description' => '<h2>Where does it come from?</h2>

<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>',
                'client' => 'Non dolore nulla fug',
                'location' => '07-Jul-1990',
                'category' => '28-Feb-1981',
                'start_date' => '2019-07-24 18:32:00',
                'end_date' => '1990-01-14 20:28:00',
                'website' => '27-Sep-1972',
                'created_at' => '2022-03-28 06:33:32',
                'updated_at' => '2022-03-28 06:33:32',
            ),
        ));
        
        
    }
}