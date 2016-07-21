<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMusiclibrariesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musiclibraries', function(Blueprint $table)
        {
            //$table->integer('MUSICID', true);
            $table->increments('id');
            $table->string('CATALOGNUM', 10)->unique('CATALOGNUM_NDX');
            $table->string('TITLE', 80);
            $table->text('DESCRIPTION', 65535)->nullable();
            $table->integer('STYLEID')->unsigned()->nullable();
            $table->foreign('STYLEID')->references('id')->on('styles');
            $table->string('COPYRIGHT', 40)->nullable();
            $table->string('COMPOSER', 40);
            $table->string('ARRANGER', 40);
            $table->string('LYRICIST', 40)->nullable();
            $table->string('PUBLISHER', 40)->nullable();
            $table->date('PUBYEAR', 4)->nullable();
            $table->integer('PERFGRADE')->nullable();
            $table->boolean('TRANSCRIPTION')->nullable();
            $table->integer('TEMPOID')->unsigned()->nullable();
            $table->foreign('TEMPOID')->references('id')->on('tempos');
            $table->time('STDPLAYTIME')->nullable();
            $table->time('EXTPLAYTIME')->nullable();
            $table->boolean('VOCAL')->nullable();
            $table->boolean('VOCALISTS')->nullable()->default(0);
            $table->string('VOICES', 50)->nullable();
            $table->text('INSTRUMENTATION', 65535)->nullable();
            $table->integer('VCFI')->nullable();
            $table->boolean('COMMARRANGEMENT')->nullable();
            $table->text('PERFCOMMENTS', 65535)->nullable();
            //$table->dateTime('LASTUPDATE')->nullable();
            $table->integer('UPDATEUSERID')->nullable();
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
