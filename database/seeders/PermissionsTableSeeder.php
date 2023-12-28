<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'About index',
                'name' => 'about-index',
                'guard_name' => 'admin',
                'permission_group_id' => 1,
                'created_at' => '2022-05-11 14:14:46',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'About create',
                'name' => 'about-create',
                'guard_name' => 'admin',
                'permission_group_id' => 1,
                'created_at' => '2022-05-11 14:14:46',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'About edit',
                'name' => 'about-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 1,
                'created_at' => '2022-05-11 14:14:46',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'About delete',
                'name' => 'about-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 1,
                'created_at' => '2022-05-11 14:14:46',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Admin language index',
                'name' => 'admin-language-index',
                'guard_name' => 'admin',
                'permission_group_id' => 2,
                'created_at' => '2022-05-11 14:14:46',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Admin language create',
                'name' => 'admin-language-create',
                'guard_name' => 'admin',
                'permission_group_id' => 2,
                'created_at' => '2022-05-11 14:14:46',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Admin language edit',
                'name' => 'admin-language-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 2,
                'created_at' => '2022-05-11 14:14:46',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Admin language delete',
                'name' => 'admin-language-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 2,
                'created_at' => '2022-05-11 14:14:46',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'Appointment index',
                'name' => 'appointment-index',
                'guard_name' => 'admin',
                'permission_group_id' => 3,
                'created_at' => '2022-05-11 14:14:46',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'Appointment create',
                'name' => 'appointment-create',
                'guard_name' => 'admin',
                'permission_group_id' => 3,
                'created_at' => '2022-05-11 14:14:46',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'Appointment edit',
                'name' => 'appointment-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 3,
                'created_at' => '2022-05-11 14:14:46',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'Appointment delete',
                'name' => 'appointment-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 3,
                'created_at' => '2022-05-11 14:14:46',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            12 => 
            array (
                'id' => 13,
                'title' => 'Blog category index',
                'name' => 'blog-category-index',
                'guard_name' => 'admin',
                'permission_group_id' => 4,
                'created_at' => '2022-05-11 14:14:46',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            13 => 
            array (
                'id' => 14,
                'title' => 'Blog category create',
                'name' => 'blog-category-create',
                'guard_name' => 'admin',
                'permission_group_id' => 4,
                'created_at' => '2022-05-11 14:14:46',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            14 => 
            array (
                'id' => 15,
                'title' => 'Blog category edit',
                'name' => 'blog-category-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 4,
                'created_at' => '2022-05-11 14:14:46',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            15 => 
            array (
                'id' => 16,
                'title' => 'Blog category delete',
                'name' => 'blog-category-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 4,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            16 => 
            array (
                'id' => 17,
                'title' => 'Blog comment index',
                'name' => 'blog-comment-index',
                'guard_name' => 'admin',
                'permission_group_id' => 5,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            17 => 
            array (
                'id' => 18,
                'title' => 'Blog comment create',
                'name' => 'blog-comment-create',
                'guard_name' => 'admin',
                'permission_group_id' => 5,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            18 => 
            array (
                'id' => 19,
                'title' => 'Blog comment edit',
                'name' => 'blog-comment-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 5,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            19 => 
            array (
                'id' => 20,
                'title' => 'Blog comment delete',
                'name' => 'blog-comment-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 5,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            20 => 
            array (
                'id' => 21,
                'title' => 'Blog index',
                'name' => 'blog-index',
                'guard_name' => 'admin',
                'permission_group_id' => 6,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            21 => 
            array (
                'id' => 22,
                'title' => 'Blog create',
                'name' => 'blog-create',
                'guard_name' => 'admin',
                'permission_group_id' => 6,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            22 => 
            array (
                'id' => 23,
                'title' => 'Blog edit',
                'name' => 'blog-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 6,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            23 => 
            array (
                'id' => 24,
                'title' => 'Blog delete',
                'name' => 'blog-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 6,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            24 => 
            array (
                'id' => 25,
                'title' => 'Contact message index',
                'name' => 'contact-message-index',
                'guard_name' => 'admin',
                'permission_group_id' => 7,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            25 => 
            array (
                'id' => 26,
                'title' => 'Contact message create',
                'name' => 'contact-message-create',
                'guard_name' => 'admin',
                'permission_group_id' => 7,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            26 => 
            array (
                'id' => 27,
                'title' => 'Contact message edit',
                'name' => 'contact-message-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 7,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            27 => 
            array (
                'id' => 28,
                'title' => 'Contact message delete',
                'name' => 'contact-message-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 7,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            28 => 
            array (
                'id' => 29,
                'title' => 'Contact page index',
                'name' => 'contact-page-index',
                'guard_name' => 'admin',
                'permission_group_id' => 8,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            29 => 
            array (
                'id' => 30,
                'title' => 'Contact page create',
                'name' => 'contact-page-create',
                'guard_name' => 'admin',
                'permission_group_id' => 8,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            30 => 
            array (
                'id' => 31,
                'title' => 'Contact page edit',
                'name' => 'contact-page-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 8,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            31 => 
            array (
                'id' => 32,
                'title' => 'Contact page delete',
                'name' => 'contact-page-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 8,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            32 => 
            array (
                'id' => 33,
                'title' => 'Email template index',
                'name' => 'email-template-index',
                'guard_name' => 'admin',
                'permission_group_id' => 9,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            33 => 
            array (
                'id' => 34,
                'title' => 'Email template create',
                'name' => 'email-template-create',
                'guard_name' => 'admin',
                'permission_group_id' => 9,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            34 => 
            array (
                'id' => 35,
                'title' => 'Email template edit',
                'name' => 'email-template-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 9,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            35 => 
            array (
                'id' => 36,
                'title' => 'Email template delete',
                'name' => 'email-template-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 9,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            36 => 
            array (
                'id' => 37,
                'title' => 'Faq index',
                'name' => 'faq-index',
                'guard_name' => 'admin',
                'permission_group_id' => 10,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            37 => 
            array (
                'id' => 38,
                'title' => 'Faq create',
                'name' => 'faq-create',
                'guard_name' => 'admin',
                'permission_group_id' => 10,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            38 => 
            array (
                'id' => 39,
                'title' => 'Faq edit',
                'name' => 'faq-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 10,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            39 => 
            array (
                'id' => 40,
                'title' => 'Faq delete',
                'name' => 'faq-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 10,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            40 => 
            array (
                'id' => 41,
                'title' => 'Footer contact item index',
                'name' => 'footer-contact-item-index',
                'guard_name' => 'admin',
                'permission_group_id' => 11,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            41 => 
            array (
                'id' => 42,
                'title' => 'Footer contact item create',
                'name' => 'footer-contact-item-create',
                'guard_name' => 'admin',
                'permission_group_id' => 11,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            42 => 
            array (
                'id' => 43,
                'title' => 'Footer contact item edit',
                'name' => 'footer-contact-item-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 11,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            43 => 
            array (
                'id' => 44,
                'title' => 'Footer contact item delete',
                'name' => 'footer-contact-item-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 11,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            44 => 
            array (
                'id' => 45,
                'title' => 'Footer information index',
                'name' => 'footer-information-index',
                'guard_name' => 'admin',
                'permission_group_id' => 12,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            45 => 
            array (
                'id' => 46,
                'title' => 'Footer information create',
                'name' => 'footer-information-create',
                'guard_name' => 'admin',
                'permission_group_id' => 12,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            46 => 
            array (
                'id' => 47,
                'title' => 'Footer information edit',
                'name' => 'footer-information-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 12,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            47 => 
            array (
                'id' => 48,
                'title' => 'Footer information delete',
                'name' => 'footer-information-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 12,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            48 => 
            array (
                'id' => 49,
                'title' => 'Footer link index',
                'name' => 'footer-link-index',
                'guard_name' => 'admin',
                'permission_group_id' => 13,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            49 => 
            array (
                'id' => 50,
                'title' => 'Footer link create',
                'name' => 'footer-link-create',
                'guard_name' => 'admin',
                'permission_group_id' => 13,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            50 => 
            array (
                'id' => 51,
                'title' => 'Footer link edit',
                'name' => 'footer-link-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 13,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            51 => 
            array (
                'id' => 52,
                'title' => 'Footer link delete',
                'name' => 'footer-link-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 13,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            52 => 
            array (
                'id' => 53,
                'title' => 'Frontend language index',
                'name' => 'frontend-language-index',
                'guard_name' => 'admin',
                'permission_group_id' => 14,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            53 => 
            array (
                'id' => 54,
                'title' => 'Frontend language create',
                'name' => 'frontend-language-create',
                'guard_name' => 'admin',
                'permission_group_id' => 14,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            54 => 
            array (
                'id' => 55,
                'title' => 'Frontend language edit',
                'name' => 'frontend-language-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 14,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            55 => 
            array (
                'id' => 56,
                'title' => 'Frontend language delete',
                'name' => 'frontend-language-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 14,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            56 => 
            array (
                'id' => 57,
                'title' => 'Header contact index',
                'name' => 'header-contact-index',
                'guard_name' => 'admin',
                'permission_group_id' => 15,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            57 => 
            array (
                'id' => 58,
                'title' => 'Header contact create',
                'name' => 'header-contact-create',
                'guard_name' => 'admin',
                'permission_group_id' => 15,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            58 => 
            array (
                'id' => 59,
                'title' => 'Header contact edit',
                'name' => 'header-contact-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 15,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            59 => 
            array (
                'id' => 60,
                'title' => 'Header contact delete',
                'name' => 'header-contact-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 15,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            60 => 
            array (
                'id' => 61,
                'title' => 'Intro index',
                'name' => 'intro-index',
                'guard_name' => 'admin',
                'permission_group_id' => 16,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            61 => 
            array (
                'id' => 62,
                'title' => 'Intro create',
                'name' => 'intro-create',
                'guard_name' => 'admin',
                'permission_group_id' => 16,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            62 => 
            array (
                'id' => 63,
                'title' => 'Intro edit',
                'name' => 'intro-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 16,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            63 => 
            array (
                'id' => 64,
                'title' => 'Intro delete',
                'name' => 'intro-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 16,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            64 => 
            array (
                'id' => 65,
                'title' => 'Media manager index',
                'name' => 'media-manager-index',
                'guard_name' => 'admin',
                'permission_group_id' => 17,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            65 => 
            array (
                'id' => 66,
                'title' => 'Media manager create',
                'name' => 'media-manager-create',
                'guard_name' => 'admin',
                'permission_group_id' => 17,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            66 => 
            array (
                'id' => 67,
                'title' => 'Media manager edit',
                'name' => 'media-manager-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 17,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            67 => 
            array (
                'id' => 68,
                'title' => 'Media manager delete',
                'name' => 'media-manager-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 17,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            68 => 
            array (
                'id' => 69,
                'title' => 'Menu builder index',
                'name' => 'menu-builder-index',
                'guard_name' => 'admin',
                'permission_group_id' => 18,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            69 => 
            array (
                'id' => 70,
                'title' => 'Menu builder create',
                'name' => 'menu-builder-create',
                'guard_name' => 'admin',
                'permission_group_id' => 18,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            70 => 
            array (
                'id' => 71,
                'title' => 'Menu builder edit',
                'name' => 'menu-builder-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 18,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            71 => 
            array (
                'id' => 72,
                'title' => 'Menu builder delete',
                'name' => 'menu-builder-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 18,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            72 => 
            array (
                'id' => 73,
                'title' => 'Order index',
                'name' => 'order-index',
                'guard_name' => 'admin',
                'permission_group_id' => 19,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            73 => 
            array (
                'id' => 74,
                'title' => 'Order create',
                'name' => 'order-create',
                'guard_name' => 'admin',
                'permission_group_id' => 19,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            74 => 
            array (
                'id' => 75,
                'title' => 'Order edit',
                'name' => 'order-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 19,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            75 => 
            array (
                'id' => 76,
                'title' => 'Order delete',
                'name' => 'order-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 19,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            76 => 
            array (
                'id' => 77,
                'title' => 'Page builder index',
                'name' => 'page-builder-index',
                'guard_name' => 'admin',
                'permission_group_id' => 20,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            77 => 
            array (
                'id' => 78,
                'title' => 'Page builder create',
                'name' => 'page-builder-create',
                'guard_name' => 'admin',
                'permission_group_id' => 20,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            78 => 
            array (
                'id' => 79,
                'title' => 'Page builder edit',
                'name' => 'page-builder-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 20,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            79 => 
            array (
                'id' => 80,
                'title' => 'Page builder delete',
                'name' => 'page-builder-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 20,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            80 => 
            array (
                'id' => 81,
                'title' => 'Parallax index',
                'name' => 'parallax-index',
                'guard_name' => 'admin',
                'permission_group_id' => 21,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            81 => 
            array (
                'id' => 82,
                'title' => 'Parallax create',
                'name' => 'parallax-create',
                'guard_name' => 'admin',
                'permission_group_id' => 21,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            82 => 
            array (
                'id' => 83,
                'title' => 'Parallax edit',
                'name' => 'parallax-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 21,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            83 => 
            array (
                'id' => 84,
                'title' => 'Parallax delete',
                'name' => 'parallax-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 21,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            84 => 
            array (
                'id' => 85,
                'title' => 'Portfolio index',
                'name' => 'portfolio-index',
                'guard_name' => 'admin',
                'permission_group_id' => 22,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            85 => 
            array (
                'id' => 86,
                'title' => 'Portfolio create',
                'name' => 'portfolio-create',
                'guard_name' => 'admin',
                'permission_group_id' => 22,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            86 => 
            array (
                'id' => 87,
                'title' => 'Portfolio edit',
                'name' => 'portfolio-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 22,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            87 => 
            array (
                'id' => 88,
                'title' => 'Portfolio delete',
                'name' => 'portfolio-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 22,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            88 => 
            array (
                'id' => 89,
                'title' => 'Privacy policy index',
                'name' => 'privacy-policy-index',
                'guard_name' => 'admin',
                'permission_group_id' => 23,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            89 => 
            array (
                'id' => 90,
                'title' => 'Privacy policy create',
                'name' => 'privacy-policy-create',
                'guard_name' => 'admin',
                'permission_group_id' => 23,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            90 => 
            array (
                'id' => 91,
                'title' => 'Privacy policy edit',
                'name' => 'privacy-policy-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 23,
                'created_at' => '2022-05-11 14:14:47',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            91 => 
            array (
                'id' => 92,
                'title' => 'Privacy policy delete',
                'name' => 'privacy-policy-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 23,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            92 => 
            array (
                'id' => 93,
                'title' => 'Product category index',
                'name' => 'product-category-index',
                'guard_name' => 'admin',
                'permission_group_id' => 24,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            93 => 
            array (
                'id' => 94,
                'title' => 'Product category create',
                'name' => 'product-category-create',
                'guard_name' => 'admin',
                'permission_group_id' => 24,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            94 => 
            array (
                'id' => 95,
                'title' => 'Product category edit',
                'name' => 'product-category-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 24,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            95 => 
            array (
                'id' => 96,
                'title' => 'Product category delete',
                'name' => 'product-category-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 24,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            96 => 
            array (
                'id' => 97,
                'title' => 'Product index',
                'name' => 'product-index',
                'guard_name' => 'admin',
                'permission_group_id' => 25,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            97 => 
            array (
                'id' => 98,
                'title' => 'Product create',
                'name' => 'product-create',
                'guard_name' => 'admin',
                'permission_group_id' => 25,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            98 => 
            array (
                'id' => 99,
                'title' => 'Product edit',
                'name' => 'product-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 25,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            99 => 
            array (
                'id' => 100,
                'title' => 'Product delete',
                'name' => 'product-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 25,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            100 => 
            array (
                'id' => 101,
                'title' => 'Product review index',
                'name' => 'product-review-index',
                'guard_name' => 'admin',
                'permission_group_id' => 26,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            101 => 
            array (
                'id' => 102,
                'title' => 'Product review create',
                'name' => 'product-review-create',
                'guard_name' => 'admin',
                'permission_group_id' => 26,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            102 => 
            array (
                'id' => 103,
                'title' => 'Product review edit',
                'name' => 'product-review-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 26,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            103 => 
            array (
                'id' => 104,
                'title' => 'Product review delete',
                'name' => 'product-review-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 26,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            104 => 
            array (
                'id' => 105,
                'title' => 'Send email index',
                'name' => 'send-email-index',
                'guard_name' => 'admin',
                'permission_group_id' => 27,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            105 => 
            array (
                'id' => 106,
                'title' => 'Send email create',
                'name' => 'send-email-create',
                'guard_name' => 'admin',
                'permission_group_id' => 27,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            106 => 
            array (
                'id' => 107,
                'title' => 'Send email edit',
                'name' => 'send-email-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 27,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            107 => 
            array (
                'id' => 108,
                'title' => 'Send email delete',
                'name' => 'send-email-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 27,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            108 => 
            array (
                'id' => 109,
                'title' => 'Service index',
                'name' => 'service-index',
                'guard_name' => 'admin',
                'permission_group_id' => 28,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            109 => 
            array (
                'id' => 110,
                'title' => 'Service create',
                'name' => 'service-create',
                'guard_name' => 'admin',
                'permission_group_id' => 28,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            110 => 
            array (
                'id' => 111,
                'title' => 'Service edit',
                'name' => 'service-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 28,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            111 => 
            array (
                'id' => 112,
                'title' => 'Service delete',
                'name' => 'service-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 28,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            112 => 
            array (
                'id' => 113,
                'title' => 'Settings index',
                'name' => 'settings-index',
                'guard_name' => 'admin',
                'permission_group_id' => 29,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            113 => 
            array (
                'id' => 114,
                'title' => 'Settings create',
                'name' => 'settings-create',
                'guard_name' => 'admin',
                'permission_group_id' => 29,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            114 => 
            array (
                'id' => 115,
                'title' => 'Settings edit',
                'name' => 'settings-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 29,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            115 => 
            array (
                'id' => 116,
                'title' => 'Settings delete',
                'name' => 'settings-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 29,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            116 => 
            array (
                'id' => 117,
                'title' => 'Shipping country index',
                'name' => 'shipping-country-index',
                'guard_name' => 'admin',
                'permission_group_id' => 30,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            117 => 
            array (
                'id' => 118,
                'title' => 'Shipping country create',
                'name' => 'shipping-country-create',
                'guard_name' => 'admin',
                'permission_group_id' => 30,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            118 => 
            array (
                'id' => 119,
                'title' => 'Shipping country edit',
                'name' => 'shipping-country-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 30,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            119 => 
            array (
                'id' => 120,
                'title' => 'Shipping country delete',
                'name' => 'shipping-country-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 30,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            120 => 
            array (
                'id' => 121,
                'title' => 'Shop discount index',
                'name' => 'shop-discount-index',
                'guard_name' => 'admin',
                'permission_group_id' => 31,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            121 => 
            array (
                'id' => 122,
                'title' => 'Shop discount create',
                'name' => 'shop-discount-create',
                'guard_name' => 'admin',
                'permission_group_id' => 31,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            122 => 
            array (
                'id' => 123,
                'title' => 'Shop discount edit',
                'name' => 'shop-discount-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 31,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            123 => 
            array (
                'id' => 124,
                'title' => 'Shop discount delete',
                'name' => 'shop-discount-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 31,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            124 => 
            array (
                'id' => 125,
                'title' => 'Shop service index',
                'name' => 'shop-service-index',
                'guard_name' => 'admin',
                'permission_group_id' => 32,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            125 => 
            array (
                'id' => 126,
                'title' => 'Shop service create',
                'name' => 'shop-service-create',
                'guard_name' => 'admin',
                'permission_group_id' => 32,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            126 => 
            array (
                'id' => 127,
                'title' => 'Shop service edit',
                'name' => 'shop-service-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 32,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            127 => 
            array (
                'id' => 128,
                'title' => 'Shop service delete',
                'name' => 'shop-service-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 32,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            128 => 
            array (
                'id' => 129,
                'title' => 'Shop settings index',
                'name' => 'shop-settings-index',
                'guard_name' => 'admin',
                'permission_group_id' => 33,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            129 => 
            array (
                'id' => 130,
                'title' => 'Shop settings create',
                'name' => 'shop-settings-create',
                'guard_name' => 'admin',
                'permission_group_id' => 33,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            130 => 
            array (
                'id' => 131,
                'title' => 'Shop settings edit',
                'name' => 'shop-settings-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 33,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            131 => 
            array (
                'id' => 132,
                'title' => 'Shop settings delete',
                'name' => 'shop-settings-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 33,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            132 => 
            array (
                'id' => 133,
                'title' => 'Shop slider index',
                'name' => 'shop-slider-index',
                'guard_name' => 'admin',
                'permission_group_id' => 34,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            133 => 
            array (
                'id' => 134,
                'title' => 'Shop slider create',
                'name' => 'shop-slider-create',
                'guard_name' => 'admin',
                'permission_group_id' => 34,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            134 => 
            array (
                'id' => 135,
                'title' => 'Shop slider edit',
                'name' => 'shop-slider-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 34,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            135 => 
            array (
                'id' => 136,
                'title' => 'Shop slider delete',
                'name' => 'shop-slider-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 34,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            136 => 
            array (
                'id' => 137,
                'title' => 'Slider index',
                'name' => 'slider-index',
                'guard_name' => 'admin',
                'permission_group_id' => 35,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            137 => 
            array (
                'id' => 138,
                'title' => 'Slider create',
                'name' => 'slider-create',
                'guard_name' => 'admin',
                'permission_group_id' => 35,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            138 => 
            array (
                'id' => 139,
                'title' => 'Slider edit',
                'name' => 'slider-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 35,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            139 => 
            array (
                'id' => 140,
                'title' => 'Slider delete',
                'name' => 'slider-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 35,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            140 => 
            array (
                'id' => 141,
                'title' => 'Social link index',
                'name' => 'social-link-index',
                'guard_name' => 'admin',
                'permission_group_id' => 36,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            141 => 
            array (
                'id' => 142,
                'title' => 'Social link create',
                'name' => 'social-link-create',
                'guard_name' => 'admin',
                'permission_group_id' => 36,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            142 => 
            array (
                'id' => 143,
                'title' => 'Social link edit',
                'name' => 'social-link-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 36,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            143 => 
            array (
                'id' => 144,
                'title' => 'Social link delete',
                'name' => 'social-link-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 36,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            144 => 
            array (
                'id' => 145,
                'title' => 'Sponsor index',
                'name' => 'sponsor-index',
                'guard_name' => 'admin',
                'permission_group_id' => 37,
                'created_at' => '2022-05-11 14:14:48',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            145 => 
            array (
                'id' => 146,
                'title' => 'Sponsor create',
                'name' => 'sponsor-create',
                'guard_name' => 'admin',
                'permission_group_id' => 37,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            146 => 
            array (
                'id' => 147,
                'title' => 'Sponsor edit',
                'name' => 'sponsor-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 37,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            147 => 
            array (
                'id' => 148,
                'title' => 'Sponsor delete',
                'name' => 'sponsor-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 37,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            148 => 
            array (
                'id' => 149,
                'title' => 'Statistic index',
                'name' => 'statistic-index',
                'guard_name' => 'admin',
                'permission_group_id' => 38,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            149 => 
            array (
                'id' => 150,
                'title' => 'Statistic create',
                'name' => 'statistic-create',
                'guard_name' => 'admin',
                'permission_group_id' => 38,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            150 => 
            array (
                'id' => 151,
                'title' => 'Statistic edit',
                'name' => 'statistic-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 38,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            151 => 
            array (
                'id' => 152,
                'title' => 'Statistic delete',
                'name' => 'statistic-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 38,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            152 => 
            array (
                'id' => 153,
                'title' => 'Statistic item index',
                'name' => 'statistic-item-index',
                'guard_name' => 'admin',
                'permission_group_id' => 39,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            153 => 
            array (
                'id' => 154,
                'title' => 'Statistic item create',
                'name' => 'statistic-item-create',
                'guard_name' => 'admin',
                'permission_group_id' => 39,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            154 => 
            array (
                'id' => 155,
                'title' => 'Statistic item edit',
                'name' => 'statistic-item-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 39,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            155 => 
            array (
                'id' => 156,
                'title' => 'Statistic item delete',
                'name' => 'statistic-item-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 39,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            156 => 
            array (
                'id' => 157,
                'title' => 'Subscriber index',
                'name' => 'subscriber-index',
                'guard_name' => 'admin',
                'permission_group_id' => 40,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            157 => 
            array (
                'id' => 158,
                'title' => 'Subscriber create',
                'name' => 'subscriber-create',
                'guard_name' => 'admin',
                'permission_group_id' => 40,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            158 => 
            array (
                'id' => 159,
                'title' => 'Subscriber edit',
                'name' => 'subscriber-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 40,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            159 => 
            array (
                'id' => 160,
                'title' => 'Subscriber delete',
                'name' => 'subscriber-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 40,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            160 => 
            array (
                'id' => 161,
                'title' => 'Terms of use index',
                'name' => 'terms-of-use-index',
                'guard_name' => 'admin',
                'permission_group_id' => 41,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            161 => 
            array (
                'id' => 162,
                'title' => 'Terms of use create',
                'name' => 'terms-of-use-create',
                'guard_name' => 'admin',
                'permission_group_id' => 41,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            162 => 
            array (
                'id' => 163,
                'title' => 'Terms of use edit',
                'name' => 'terms-of-use-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 41,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            163 => 
            array (
                'id' => 164,
                'title' => 'Terms of use delete',
                'name' => 'terms-of-use-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 41,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            164 => 
            array (
                'id' => 165,
                'title' => 'Testimonial index',
                'name' => 'testimonial-index',
                'guard_name' => 'admin',
                'permission_group_id' => 42,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            165 => 
            array (
                'id' => 166,
                'title' => 'Testimonial create',
                'name' => 'testimonial-create',
                'guard_name' => 'admin',
                'permission_group_id' => 42,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            166 => 
            array (
                'id' => 167,
                'title' => 'Testimonial edit',
                'name' => 'testimonial-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 42,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            167 => 
            array (
                'id' => 168,
                'title' => 'Testimonial delete',
                'name' => 'testimonial-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 42,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            168 => 
            array (
                'id' => 169,
                'title' => 'Transaction index',
                'name' => 'transaction-index',
                'guard_name' => 'admin',
                'permission_group_id' => 43,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            169 => 
            array (
                'id' => 170,
                'title' => 'Transaction create',
                'name' => 'transaction-create',
                'guard_name' => 'admin',
                'permission_group_id' => 43,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            170 => 
            array (
                'id' => 171,
                'title' => 'Transaction edit',
                'name' => 'transaction-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 43,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            171 => 
            array (
                'id' => 172,
                'title' => 'Transaction delete',
                'name' => 'transaction-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 43,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            172 => 
            array (
                'id' => 173,
                'title' => 'User data index',
                'name' => 'user-data-index',
                'guard_name' => 'admin',
                'permission_group_id' => 44,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            173 => 
            array (
                'id' => 174,
                'title' => 'User data create',
                'name' => 'user-data-create',
                'guard_name' => 'admin',
                'permission_group_id' => 44,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:02:59',
            ),
            174 => 
            array (
                'id' => 175,
                'title' => 'User data edit',
                'name' => 'user-data-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 44,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:03:00',
            ),
            175 => 
            array (
                'id' => 176,
                'title' => 'User data delete',
                'name' => 'user-data-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 44,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:03:00',
            ),
            176 => 
            array (
                'id' => 177,
                'title' => 'User profile index',
                'name' => 'user-profile-index',
                'guard_name' => 'admin',
                'permission_group_id' => 45,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:03:00',
            ),
            177 => 
            array (
                'id' => 178,
                'title' => 'User profile create',
                'name' => 'user-profile-create',
                'guard_name' => 'admin',
                'permission_group_id' => 45,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:03:00',
            ),
            178 => 
            array (
                'id' => 179,
                'title' => 'User profile edit',
                'name' => 'user-profile-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 45,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:03:00',
            ),
            179 => 
            array (
                'id' => 180,
                'title' => 'User profile delete',
                'name' => 'user-profile-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 45,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:03:00',
            ),
            180 => 
            array (
                'id' => 181,
                'title' => 'User index',
                'name' => 'user-index',
                'guard_name' => 'admin',
                'permission_group_id' => 46,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:03:00',
            ),
            181 => 
            array (
                'id' => 182,
                'title' => 'User create',
                'name' => 'user-create',
                'guard_name' => 'admin',
                'permission_group_id' => 46,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:03:00',
            ),
            182 => 
            array (
                'id' => 183,
                'title' => 'User edit',
                'name' => 'user-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 46,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:03:00',
            ),
            183 => 
            array (
                'id' => 184,
                'title' => 'User delete',
                'name' => 'user-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 46,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:03:00',
            ),
            184 => 
            array (
                'id' => 185,
                'title' => 'Role index',
                'name' => 'role-index',
                'guard_name' => 'admin',
                'permission_group_id' => 47,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:03:00',
            ),
            185 => 
            array (
                'id' => 186,
                'title' => 'Role create',
                'name' => 'role-create',
                'guard_name' => 'admin',
                'permission_group_id' => 47,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:03:00',
            ),
            186 => 
            array (
                'id' => 187,
                'title' => 'Role edit',
                'name' => 'role-edit',
                'guard_name' => 'admin',
                'permission_group_id' => 47,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:03:00',
            ),
            187 => 
            array (
                'id' => 188,
                'title' => 'Role delete',
                'name' => 'role-delete',
                'guard_name' => 'admin',
                'permission_group_id' => 47,
                'created_at' => '2022-05-11 14:14:49',
                'updated_at' => '2022-05-16 16:03:00',
            ),
        ));
        
        
    }
}