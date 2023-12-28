<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('faqs')->delete();
        
        \DB::table('faqs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'question' => 'Where does it come from?',
                'answer' => 'Where does it come from?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'created_at' => '2022-03-28 06:27:03',
                'updated_at' => '2022-03-28 06:27:55',
            ),
            1 => 
            array (
                'id' => 2,
                'question' => 'What is Lorem Ipsum?',
                'answer' => 'What is Lorem Ipsum?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'created_at' => '2022-03-28 06:27:22',
                'updated_at' => '2022-03-28 06:27:22',
            ),
            2 => 
            array (
                'id' => 3,
                'question' => 'Why do we use it?',
                'answer' => 'Why do we use it?
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
                'created_at' => '2022-03-28 06:27:39',
                'updated_at' => '2022-03-28 06:27:39',
            ),
            3 => 
            array (
                'id' => 4,
                'question' => 'Where can I get some?',
                'answer' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.',
                'created_at' => '2022-03-28 06:28:25',
                'updated_at' => '2022-03-28 06:28:25',
            ),
        ));
        
        
    }
}