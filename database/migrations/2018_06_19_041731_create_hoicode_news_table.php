<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoicodeNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoicode_news', function (Blueprint $table) {
            $table->increments('news_id');
 
            $table->string('news_name');
             
            $table->string('news_slug');
             
            $table->string('news_img');
             
            $table->string('news_author');
             
            $table->text('news_content');
             
            $table->integer('cat_id');
             
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
        Schema::dropIfExists('hoicode_news');
    }
}
