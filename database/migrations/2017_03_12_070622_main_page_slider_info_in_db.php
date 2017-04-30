<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MainPageSliderInfoInDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mslides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('header_inf',100);
            $table->string('body_inf',100);
            $table->string('more_inf',100);
            $table->string('avatar',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mslides');
    }
}
