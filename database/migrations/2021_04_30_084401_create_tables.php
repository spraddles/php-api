<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_table', function (Blueprint $table1) {
            $table1->integer('userId'); // set primary key later
            $table1->string('userFirstname');
            $table1->string('userSurname');
            $table1->string('userEmail');
        });
        Schema::create('user_events_table', function (Blueprint $table2) {
            $table2->integer('eventId'); // set primary key later
            $table2->integer('userId');  // set foereign key later        
            $table2->string('eventDate');
            $table2->string('eventType');
            $table2->string('eventMessage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_table');
        Schema::dropIfExists('user_events_table');
    }
}
