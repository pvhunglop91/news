<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_url');
            $table->text('summary');
            $table->longText('content');
            $table->string('image');
            $table->integer('highlight')->default(0);
            $table->integer('view')->default(0);
            $table->integer('id_type_of_news')->unsigned();
            $table->foreign('id_type_of_news')->references('id')->on('type_of_news');
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
        Schema::dropIfExists('news');
    }
}
