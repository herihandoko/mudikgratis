<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoogleRecaptchasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('google_recaptchas', function (Blueprint $table) {
            $table->id();
            $table->string('recaptcha_site_key')->nullable();
            $table->string('recaptcha_secret_key')->nullable();
            $table->boolean('recaptcha_status')->nullable();
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
        Schema::dropIfExists('google_recaptchas');
    }
}
