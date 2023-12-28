<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('site_description')->nullable();
            $table->string('site_tags')->nullable();
            $table->string('site_time_zone')->nullable();
            $table->string('site_currency')->nullable();
            $table->string('site_currency_icon')->nullable();
            $table->string('site_direction')->nullable();
            $table->string('site_primary_color')->nullable();
            $table->string('site_secondary_color')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->string('site_header')->nullable();
            $table->string('site_footer')->nullable();
            $table->string('section_icon')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('blog_pagination')->nullable();
            $table->string('blog_search_pagination')->nullable();
            $table->string('blog_archive_pagination')->nullable();
            $table->string('blog_tag_search_pagination')->nullable();
            $table->string('blog_category_pagination')->nullable();
            $table->boolean('save_contact_message')->nullable();
            $table->boolean('preloader_enabled')->nullable();
            $table->boolean('preloader_style')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
