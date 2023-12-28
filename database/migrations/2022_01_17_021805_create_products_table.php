<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('slug');
            $table->float('price');
            $table->float('discount_price')->nullable();
            $table->text('short_description');
            $table->text('description');
            $table->string('sku')->nullable();
            $table->string('brand')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('weight')->nullable();
            $table->string('dimensions')->nullable();
            $table->unsignedBigInteger('stock')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
