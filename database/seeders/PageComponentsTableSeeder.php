<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageComponentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('page_components')->delete();
        
        \DB::table('page_components')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Page Title Left',
                'view' => 'frontend.components.titleComponents.titleTextLeft',
                'image' => '/assets/admin/images/component/title_text_left.png',
                'category_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Page Title Right',
                'view' => 'frontend.components.titleComponents.titleTextRight',
                'image' => '/assets/admin/images/component/title_text_right.png',
                'category_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Hero Section',
                'view' => 'frontend.components.homeComponents.heroSection',
                'image' => '/assets/admin/images/component/hero_section.png',
                'category_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Intro Section',
                'view' => 'frontend.components.homeComponents.introSection',
                'image' => '/assets/admin/images/component/intro_section.png',
                'category_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Service Section',
                'view' => 'frontend.components.homeComponents.serviceSection',
                'image' => '/assets/admin/images/component/service_section.png',
                'category_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Testimonial Section',
                'view' => 'frontend.components.homeComponents.testimonialSection',
                'image' => '/assets/admin/images/component/testimonial_section.png',
                'category_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Brands',
                'view' => 'frontend.components.homeComponents.brandSection',
                'image' => '/assets/admin/images/component/brand_section.png',
                'category_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Projects',
                'view' => 'frontend.components.homeComponents.projectsSection',
                'image' => '/assets/admin/images/component/projects_section.png',
                'category_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'News and Articles',
                'view' => 'frontend.components.homeComponents.newsSection',
                'image' => '/assets/admin/images/component/news_section.png',
                'category_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'News Letter Section',
                'view' => 'frontend.components.homeComponents.newsLetterSection',
                'image' => '/assets/admin/images/component/news_letter_Section.png',
                'category_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Revolution Slider',
                'view' => 'frontend.components.sliderComponents.revolutionSlider',
                'image' => '/assets/admin/images/component/revolution_slider.png',
                'category_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Owl Carousel',
                'view' => 'frontend.components.sliderComponents.owlCarousel',
                'image' => '/assets/admin/images/component/owl_carousel.png',
                'category_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Service Style One',
                'view' => 'frontend.components.serviceComponents.serviceStyleOne',
                'image' => '/assets/admin/images/component/service_style_one.png',
                'category_id' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Service Style Two',
                'view' => 'frontend.components.serviceComponents.serviceStyleTwo',
                'image' => '/assets/admin/images/component/service_style_two.png',
                'category_id' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'About Intro',
                'view' => 'frontend.components.aboutComponents.aboutIntro',
                'image' => '/assets/admin/images/component/about.png',
                'category_id' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'About Cases',
                'view' => 'frontend.components.aboutComponents.aboutCases',
                'image' => '/assets/admin/images/component/about_services.png',
                'category_id' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'About Parallax',
                'view' => 'frontend.components.aboutComponents.aboutParallax',
                'image' => '/assets/admin/images/component/about_parallax.png',
                'category_id' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'About Brands',
                'view' => 'frontend.components.aboutComponents.aboutBrands',
                'image' => '/assets/admin/images/component/brand_section.png',
                'category_id' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'FAQ Style One',
                'view' => 'frontend.components.faqComponents.faqStyleOne',
                'image' => '/assets/admin/images/component/faq_style_one.png',
                'category_id' => '6',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'FAQ Style Two',
                'view' => 'frontend.components.faqComponents.faqStyleTwo',
                'image' => '/assets/admin/images/component/faq_style_two.png',
                'category_id' => '6',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Portfolio Gallery',
                'view' => 'frontend.components.portfolioComponents.portfolioGallery',
                'image' => '/assets/admin/images/component/portfolio_gallery.png',
                'category_id' => '7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Privacy Policy Content',
                'view' => 'frontend.components.privacyPolicyComponents.privacyPolicy',
                'image' => '/assets/admin/images/component/privacy-policy.png',
                'category_id' => '8',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Terms Of Use',
                'view' => 'frontend.components.termsOfUSeComponents.termsOfUse',
                'image' => '/assets/admin/images/component/terms-of-use.png',
                'category_id' => '9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Contact',
                'view' => 'frontend.components.contactPageComponents.contactUs',
                'image' => '/assets/admin/images/component/contact_us.png',
                'category_id' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}