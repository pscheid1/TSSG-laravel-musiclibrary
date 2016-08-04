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
            $table->string('username', 45)->unique()->required();
            $table->string('prefix', 20);
            $table->string('firstname', 20);
            $table->string('middlename', 20);
            $table->string('lastname', 45);
            $table->string('sufix', 20);
            $table->integer('userType')->unsigned()->nullable();
            $table->foreign('userType')->references('id')->on('userTypes');
            $table->string('email', 50)->unique()->required();
            $table->string('url', 256);
            $table->string('addres1', 128);
            $table->string('addres2', 128);
            $table->string('city', 128);
            $table->string('state', 80);
            $table->string('zipcode', 10);
            $table->string('phone1', 13);
            $table->string('phone2', 13);
            $table->string('companyname', 45);
            $table->string('title', 45);
            $table->text('note', 65535);
            $table->string('location', 45)->nullable();
            $table->dateTime('activated')->nullable();
            $table->dateTime('terminated')->nullable();
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
