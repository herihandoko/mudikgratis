<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'site_name' => 'Consilt',
                'site_description' => 'Lorem ipsum is simply free text dolor sit am adipi we help you ensure everyone is in the right jobs sicing elit, sed do consulting firms Et leggings across the nation tempor.',
                'site_tags' => 'consilt',
                'site_time_zone' => 'Asia/Dhaka',
                'site_currency' => 'USD',
                'site_currency_icon' => '$',
                'site_direction' => 'LTR',
                'site_primary_color' => '#0795FE',
                'site_secondary_color' => '#092A49',
                'site_logo' => 'assets/uploads/images/media_1650010122.png',
                'site_favicon' => 'assets/uploads/images/media_1649917636.png',
                'site_header' => '1',
                'site_footer' => '2',
                'section_icon' => 'assets/uploads/images/media_1649917636.png',
                'footer_logo' => 'assets/uploads/images/media_1650010148.png',
                'blog_pagination' => NULL,
                'blog_search_pagination' => NULL,
                'blog_archive_pagination' => NULL,
                'blog_tag_search_pagination' => NULL,
                'blog_category_pagination' => NULL,
                'save_contact_message' => 1,
                'preloader_enabled' => 1,
                'preloader_style' => 1,
                'created_at' => NULL,
                'updated_at' => '2022-05-07 03:44:34',
            ),
        ));
        
        
    }
}