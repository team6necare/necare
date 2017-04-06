<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitydetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('activitydetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activity_id')->unsigned();
            $table->integer('volunteer_id')->unsigned();
            $table->integer('victim_id')->unsigned();
            $table->integer('employee_id')->unsigned()->nullable();
            $table->string('comments')->nullable();
            $table->string('feedback')->nullable();
            $table->timestamps();
        });

      
       Schema::table('activitydetails', function (Blueprint $table) {
           $table->foreign('activity_id')->references('id')->on('activities');
        }); 

       Schema::table('activitydetails', function (Blueprint $table) {
           $table->foreign('volunteer_id')->references('id')->on('volunteers');
        }); 

       Schema::table('activitydetails', function (Blueprint $table) {
           $table->foreign('victim_id')->references('id')->on('victims');
        }); 
       Schema::table('activitydetails', function (Blueprint $table) {
           $table->foreign('employee_id')->references('id')->on('employees');
        }); 


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('activitydetails');
    }
}
