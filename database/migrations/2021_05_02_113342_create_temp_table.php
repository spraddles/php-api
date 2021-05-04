<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_table', function (Blueprint $table) {
            $table->increments('eventId');
            $table->string('userFirstname');
            $table->string('userSurname');
            $table->string('userEmail');
            $table->string('eventDate');
            $table->string('eventType');
            $table->string('eventMessage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_table');
    }
}