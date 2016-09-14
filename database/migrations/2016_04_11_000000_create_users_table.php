<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('username', 64)->unique()->required();
            $table->string('prefix', 16);
            $table->string('firstname', 64);
            $table->string('middlename', 64);
            $table->string('lastname', 64);
            $table->string('suffix', 16);
            $table->integer('currentRole')->unsigned();
            $table->string('company', 128);
            $table->string('title', 64);
            $table->text('note', 65535);
            $table->string('location', 64)->nullable();
            $table->dateTime('activated')->nullable();
            $table->dateTime('terminated')->nullable();
            $table->boolean('loginpermitted');
            $table->boolean('forcepwchange');
            $table->string('password', 128);
            $table->rememberToken();
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
        Schema::drop('users');
    }

}
