<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

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
            $table->string('firstname', 20);
            $table->string('lastname', 45);

            $table->string('email', 50)->unique()->required();
            $table->string('location', 45)->nullable();
            $table->dateTime('activated')->nullable();
            $table->dateTime('terminated')->nullable();

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
