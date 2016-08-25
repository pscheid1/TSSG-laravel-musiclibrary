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
            $table->string('sufix', 16);
            $table->integer('currentRole')->unsigned();
            $table->string('email', 128)->required();
            $table->string('url', 256);
            $table->string('address1', 128);
            $table->string('address2', 128);
            $table->string('city', 128);
            $table->string('state', 128);
            $table->string('zipcode', 10);
            $table->string('phone1', 13);
            $table->string('phone2', 13);
            $table->string('companyname', 128);
            $table->string('title', 64);
            $table->text('note', 65535);
            $table->string('location', 64)->nullable();
            $table->dateTime('activated')->nullable();
            $table->dateTime('terminated')->nullable();
            $table->boolean('usercanlogin');
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
