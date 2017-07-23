<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     
        //
        Schema::create('event', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('imagelink');
            $table->integer('counter_type');
            $table->integer('priority');
            $table->integer('status');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('offering_dept')->unsigned();
            $table->foreign('offering_dept')->references('id')->on('department');
            $table->integer('accepting_dept')->unsigned();
            $table->foreign('accepting_dept')->references('id')->on('department');
            $table->integer('event_type')->unsigned();
            $table->foreign('event_type')->references('id')->on('event_type');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('course');
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
        //
    }
}
