<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('instrument')->unsigned();
            $table->integer('mgrskill')->unsigned();
            $table->integer('skill')->unsigned();
            $table->integer('updateuserid')->unsigned()->default(null);
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
        Schema::drop('resources');
    }

}
