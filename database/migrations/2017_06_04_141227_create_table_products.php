<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('alias', 50);
            $table->text('ingredients');
            $table->text('all_text');
            $table->string('recept_by', 50);
            $table->string('cook_time', 10);
            $table->string('avatar', 50);
            $table->tinyInteger('status')->default(0);
            $table->integer('categ_id')->unsigned();
            $table->foreign('categ_id')->references('id')->on('categories');
            $table->timestamps();
        });
        Schema::dropIfExists('cocktails');
        Schema::dropIfExists('foods');
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
