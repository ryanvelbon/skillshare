<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description', 500);
            $table->boolean('paid');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('craft_id');
            $table->unsignedInteger('location_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('craft_id')->references('id')->on('crafts');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
