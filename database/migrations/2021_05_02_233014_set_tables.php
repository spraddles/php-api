<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_table', function (Blueprint $table) {
            // set primary key 
            $table->primary('userId');
        });
        Schema::table('user_events_table', function (Blueprint $table) {
            // set primary & foreign keys
            $table->primary('eventId');
            $table->foreign('userId')->references('userId')->on('user_table')->onDelete('cascade');
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