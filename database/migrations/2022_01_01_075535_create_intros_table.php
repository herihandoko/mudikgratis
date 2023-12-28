<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intros', function (Blueprint $table) {

            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->text('description');

            $table->string('why_choose_us_icon');
            $table->string('why_choose_us_title');
            $table->text('why_choose_us_description');

            $table->string('background');
            $table->string('contact_title');
            $table->string('contact_subtitle');
            $table->string('contact_number');

            $table->string('button_text');
            $table->string('button_link');

            $table->string('item_one_title');
            $table->string('item_one_description');

            $table->string('item_two_title');
            $table->string('item_two_description');

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
        Schema::dropIfExists('intros');
    }
}
