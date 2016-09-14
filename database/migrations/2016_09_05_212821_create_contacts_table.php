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
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('address1', 128);
            $table->string('address2', 128);
            $table->string('city', 128);
            $table->string('state', 128);
            $table->string('zipcode', 10);
            $table->string('phone1', 13);
            $table->string('phone2', 13);
            $table->string('email', 128);
            $table->string('weburl', 256);
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
