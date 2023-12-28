<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'migration' => '2014_10_12_000000_create_users_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'migration' => '2014_10_12_100000_create_password_resets_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'migration' => '2018_12_23_120000_create_shoppingcart_table',
                'batch' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'migration' => '2019_08_19_000000_create_failed_jobs_table',
                'batch' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'migration' => '2019_12_14_000001_create_personal_access_tokens_table',
                'batch' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'migration' => '2021_12_02_055100_create_admins_table',
                'batch' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'migration' => '2021_12_04_094816_create_menus_table',
                'batch' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'migration' => '2021_12_06_030914_create_media_table',
                'batch' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'migration' => '2021_12_07_020018_create_settings_table',
                'batch' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'migration' => '2021_12_07_102319_create_cookies_table',
                'batch' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'migration' => '2021_12_08_091420_create_payment_gateways_table',
                'batch' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'migration' => '2021_12_09_002001_create_google_analytics_table',
                'batch' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'migration' => '2021_12_09_002049_create_google_recaptchas_table',
                'batch' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'migration' => '2021_12_09_011334_create_email_settings_table',
                'batch' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'migration' => '2021_12_09_100443_create_email_templates_table',
                'batch' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'migration' => '2021_12_12_010415_create_blogs_table',
                'batch' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'migration' => '2021_12_12_014008_create_blog_categories_table',
                'batch' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'migration' => '2021_12_12_020337_create_blog_comments_table',
                'batch' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'migration' => '2021_12_15_031130_create_email_template_variables_table',
                'batch' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'migration' => '2021_12_15_093111_create_subscribers_table',
                'batch' => 1,
            ),
            20 => 
            array (
                'id' => 21,
                'migration' => '2021_12_19_082530_create_page_builders_table',
                'batch' => 1,
            ),
            21 => 
            array (
                'id' => 22,
                'migration' => '2021_12_19_121719_create_page_items_table',
                'batch' => 1,
            ),
            22 => 
            array (
                'id' => 23,
                'migration' => '2021_12_19_121737_create_page_headers_table',
                'batch' => 1,
            ),
            23 => 
            array (
                'id' => 24,
                'migration' => '2021_12_19_121810_create_page_footers_table',
                'batch' => 1,
            ),
            24 => 
            array (
                'id' => 25,
                'migration' => '2021_12_20_014325_create_page_layouts_table',
                'batch' => 1,
            ),
            25 => 
            array (
                'id' => 26,
                'migration' => '2021_12_26_032311_create_page_components_table',
                'batch' => 1,
            ),
            26 => 
            array (
                'id' => 27,
                'migration' => '2021_12_26_032326_create_page_component_categories_table',
                'batch' => 1,
            ),
            27 => 
            array (
                'id' => 28,
                'migration' => '2021_12_29_152832_create_sliders_table',
                'batch' => 1,
            ),
            28 => 
            array (
                'id' => 29,
                'migration' => '2021_12_30_105259_create_faqs_table',
                'batch' => 1,
            ),
            29 => 
            array (
                'id' => 30,
                'migration' => '2022_01_01_075515_create_services_table',
                'batch' => 1,
            ),
            30 => 
            array (
                'id' => 31,
                'migration' => '2022_01_01_075535_create_intros_table',
                'batch' => 1,
            ),
            31 => 
            array (
                'id' => 32,
                'migration' => '2022_01_01_075555_create_abouts_table',
                'batch' => 1,
            ),
            32 => 
            array (
                'id' => 33,
                'migration' => '2022_01_01_075808_create_testimonials_table',
                'batch' => 1,
            ),
            33 => 
            array (
                'id' => 34,
                'migration' => '2022_01_05_104000_create_sponsors_table',
                'batch' => 1,
            ),
            34 => 
            array (
                'id' => 35,
                'migration' => '2022_01_05_104048_create_statistics_table',
                'batch' => 1,
            ),
            35 => 
            array (
                'id' => 36,
                'migration' => '2022_01_05_104134_create_parallaxes_table',
                'batch' => 1,
            ),
            36 => 
            array (
                'id' => 37,
                'migration' => '2022_01_06_044002_create_statistic_items_table',
                'batch' => 1,
            ),
            37 => 
            array (
                'id' => 38,
                'migration' => '2022_01_09_044542_create_social_links_table',
                'batch' => 1,
            ),
            38 => 
            array (
                'id' => 39,
                'migration' => '2022_01_09_044744_create_footer_links_table',
                'batch' => 1,
            ),
            39 => 
            array (
                'id' => 40,
                'migration' => '2022_01_09_062401_create_header_contacts_table',
                'batch' => 1,
            ),
            40 => 
            array (
                'id' => 41,
                'migration' => '2022_01_09_072839_create_footer_contact_items_table',
                'batch' => 1,
            ),
            41 => 
            array (
                'id' => 42,
                'migration' => '2022_01_11_073049_create_google_maps_table',
                'batch' => 1,
            ),
            42 => 
            array (
                'id' => 43,
                'migration' => '2022_01_12_085301_create_footer_information_table',
                'batch' => 1,
            ),
            43 => 
            array (
                'id' => 44,
                'migration' => '2022_01_14_082324_create_appointments_table',
                'batch' => 1,
            ),
            44 => 
            array (
                'id' => 45,
                'migration' => '2022_01_17_021805_create_products_table',
                'batch' => 1,
            ),
            45 => 
            array (
                'id' => 46,
                'migration' => '2022_01_17_022000_create_product_categories_table',
                'batch' => 1,
            ),
            46 => 
            array (
                'id' => 47,
                'migration' => '2022_01_17_022038_create_orders_table',
                'batch' => 1,
            ),
            47 => 
            array (
                'id' => 48,
                'migration' => '2022_01_17_024924_create_transactions_table',
                'batch' => 1,
            ),
            48 => 
            array (
                'id' => 49,
                'migration' => '2022_01_20_055231_create_product_reviews_table',
                'batch' => 1,
            ),
            49 => 
            array (
                'id' => 50,
                'migration' => '2022_01_20_060442_create_shop_sliders_table',
                'batch' => 1,
            ),
            50 => 
            array (
                'id' => 51,
                'migration' => '2022_01_20_133320_create_shop_services_table',
                'batch' => 1,
            ),
            51 => 
            array (
                'id' => 52,
                'migration' => '2022_01_22_020623_create_shop_discounts_table',
                'batch' => 1,
            ),
            52 => 
            array (
                'id' => 53,
                'migration' => '2022_01_23_002024_create_user_adresses_table',
                'batch' => 1,
            ),
            53 => 
            array (
                'id' => 54,
                'migration' => '2022_01_25_031857_create_shipping_countries_table',
                'batch' => 1,
            ),
            54 => 
            array (
                'id' => 55,
                'migration' => '2022_01_25_053149_create_shop_settings_table',
                'batch' => 1,
            ),
            55 => 
            array (
                'id' => 56,
                'migration' => '2022_01_30_092552_create_order_items_table',
                'batch' => 1,
            ),
            56 => 
            array (
                'id' => 57,
                'migration' => '2022_01_30_092940_create_order_addresses_table',
                'batch' => 1,
            ),
            57 => 
            array (
                'id' => 58,
                'migration' => '2022_02_03_045442_create_portfolios_table',
                'batch' => 1,
            ),
            58 => 
            array (
                'id' => 59,
                'migration' => '2022_02_09_160406_create_privacy_policies_table',
                'batch' => 1,
            ),
            59 => 
            array (
                'id' => 60,
                'migration' => '2022_02_09_160629_create_terms_of_uses_table',
                'batch' => 1,
            ),
            60 => 
            array (
                'id' => 61,
                'migration' => '2022_02_24_040405_create_contact_messages_table',
                'batch' => 1,
            ),
            61 => 
            array (
                'id' => 62,
                'migration' => '2022_02_24_051547_create_contact_pages_table',
                'batch' => 1,
            ),
        ));
        
        
    }
}