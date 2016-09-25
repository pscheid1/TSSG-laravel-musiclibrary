<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('address1', 256);
            $table->string('address2', 256);
            $table->string('city', 256);
            $table->string('state', 256);
            $table->string('zipcode', 16);
            $table->string('phone1', 64);
            $table->string('phone2', 64);
            $table->string('email', 256);
            $table->string('weburl', 256);
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
        Schema::drop('contacts');
    }

}
