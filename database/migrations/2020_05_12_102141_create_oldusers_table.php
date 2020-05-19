<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOldusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oldusers', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id');
          $table->string('location');
          $table->text('bio');
          $table->string('website');
          $table->string('profile_image');
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
        Schema::dropIfExists('oldusers');
    }
}
