<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
         Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference_number');
            $table->integer('activity_id')->unsigned();
            $table->string('to_all_volunteers')->nullable();
            $table->string('to_all_victims')->nullable();
            $table->string('to_all_employees')->nullable();
            $table->string ('notification_subject');
            $table->string ('notification_message');
            $table->timestamps();
        });

        Schema::table('notifications', function (Blueprint $table) {
           $table->foreign('activity_id')->references('id')->on('activities');
        }); 
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('notifications');
    }
}
