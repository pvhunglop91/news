<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeOfNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_news', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('id_category')->references('id')->on('category');
            $table->unsignedBigInteger('id_category')->unsigned();
            $table->string('name');
            $table->string('name_url');
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
        Schema::dropIfExists('type_of_news');
    }
}
