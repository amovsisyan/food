<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSliderAvatarInProductsDropSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('carousels');

        Schema::create('carousels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('header_inf',80);
            $table->string('body_inf',80);
            $table->string('more_inf',80);
            $table->string('avatar',50);
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::dropIfExists('mslides');


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
