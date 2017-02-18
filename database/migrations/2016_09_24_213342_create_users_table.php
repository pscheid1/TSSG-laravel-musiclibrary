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
            $table->string('username', 64);
            $table->string('prefix', 16);
            $table->string('firstname', 64);
            $table->string('middlename', 64);
            $table->string('lastname', 64);
            $table->string('suffix', 16);
            $table->integer('currentRole')->unsigned();
            $table->text('company', 128);
            $table->string('title', 64);
            $table->string('note', 4096);
            $table->string('location');
            $table->timestamp('activated');
            $table->timestamp('terminated');
            $table->boolean('loginpermitted');
            $table->boolean('forcepwchange');
            $table->string('pageSizes');
            $table->string('password', 128);
            $table->string('email');  // only used during passwordreset operation
            $table->string('remember_token');
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
        Schema::drop('users');
    }

}
