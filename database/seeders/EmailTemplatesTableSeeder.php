<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmailTemplatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('email_templates')->delete();
        
        \DB::table('email_templates')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Reset Password',
                'subject' => 'Reset Password',
            'description' => '<h3>Click this link to reset your password -&nbsp;<span style="color: rgb(108, 117, 125); background-color: rgba(0, 0, 0, 0.02);"><a href="http://{link}" target="_blank">{link}</a></span></h3>',
                'created_at' => NULL,
                'updated_at' => '2022-02-15 05:18:37',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Transaction',
                'subject' => 'Transaction',
                'description' => 'hello {name} Your Transacrtion is successful',
                'created_at' => NULL,
                'updated_at' => '2022-02-14 07:42:45',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Welcome Email',
                'subject' => 'welcome',
            'description' => '<b>Hello&nbsp;<span style="color: rgb(108, 117, 125);">{name}! Welcome To&nbsp;</span><span style="color: rgb(108, 117, 125);">{website}</span></b>',
                'created_at' => NULL,
                'updated_at' => '2022-02-15 06:07:56',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Subscriber Confirmation',
                'subject' => 'Subscriber Confirmation',
            'description' => '<h3>Click this link to confirm your email -&nbsp;<span style="color: rgb(108, 117, 125); background-color: rgba(0, 0, 0, 0.02);"><a href="http://{link}" target="_blank">{link}</a></span></h3>',
                'created_at' => NULL,
                'updated_at' => '2022-02-14 07:42:45',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Contact Message',
                'subject' => 'Contact Message',
                'description' => '<h3>Name : {name}</h3>

<h3>Phone :&nbsp;{Phone}</h3>

<h3>Email:&nbsp;{email}</h3>

<h3>Subject:&nbsp;{subject}</h3>

<hr />
<h3>{message}</h3>',
                'created_at' => NULL,
                'updated_at' => '2022-04-01 08:25:32',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Subscribed Successfully',
                'subject' => 'Subscribed Successfully',
                'description' => '&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;You have successfully subscribed to {website}!&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;',
                'created_at' => NULL,
                'updated_at' => '2022-05-05 13:31:36',
            ),
        ));
        
        
    }
}