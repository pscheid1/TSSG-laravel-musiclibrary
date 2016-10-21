<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusiclibrariesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musiclibraries', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('CATALOGNUM', 10)->unique('CATALOGNUM_NDX');
            $table->string('TITLE', 80);
            $table->text('DESCRIPTION', 65535)->nullable();
            $table->integer('STYLEID')->unsigned();
            $table->string('COPYRIGHT', 40)->nullable();
            $table->string('COMPOSER', 40);
            $table->string('ARRANGER', 40);
            $table->string('LYRICIST', 40)->nullable();
            $table->string('PUBLISHER', 40)->nullable();
            $table->string('PUBYEAR', 4);
            $table->integer('PERFGRADE')->nullable();
            $table->boolean('TRANSCRIPTION')->default(0);
            $table->integer('TEMPOID')->unsigned();
            $table->time('STDPLAYTIME')->nullable();
            $table->time('EXTPLAYTIME')->nullable();
            $table->boolean('VOCAL')->default(0);
            $table->integer('VOCALISTS')->unsigned()->default(0);
            $table->string('VOICES', 50)->nullable();
            $table->text('INSTRUMENTATION', 65535)->nullable();
            $table->integer('VCFI')->nullable();
            $table->boolean('COMMARRANGEMENT')->default(0);
            $table->text('PERFCOMMENTS', 65535)->nullable();
            $table->integer('UPDATEUSERID')->unsigned()->default(null);
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
        Schema::drop('musiclibraries');
    }

}
