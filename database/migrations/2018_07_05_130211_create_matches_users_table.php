<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id');
            $table->integer('user_id');
            $table->integer('amountbet');
            $table->integer('choice');  // Đội đã đặt cược (đội chủ nhà-0,hòa-1, đội khách-2)
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
        Schema::dropIfExists('matches_users');
    }
}
