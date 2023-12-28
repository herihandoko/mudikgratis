<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('background');
            $table->string('foreground');
            $table->string('main_heading');
            $table->string('sub_heading');
            $table->string('discount_text');
            $table->string('button_text');
            $table->string('button_link');
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
        Schema::dropIfExists('shop_sliders');
    }
}
