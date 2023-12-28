<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {

            $table->id();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->string('slug');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('tags')->nullable();;
            $table->text('description')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('comment_status')->nullable();
            $table->boolean('on_featured')->nullable();

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
        Schema::dropIfExists('blogs');
    }
}
