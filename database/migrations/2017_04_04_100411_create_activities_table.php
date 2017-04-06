<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('activity_refno');
            $table->string('description');
            $table->datetime('start_datetime');
            $table->datetime('end_datetime');
            $table->string('status');
            $table->string('cost')->nullable();
            $table->integer('location_id')->unsigned();
            $table->integer('activity_type_id')->unsigned();
           
            $table->timestamps();
        });

       Schema::table('activities', function (Blueprint $table) {
           $table->foreign('location_id')->references('id')->on('locations');
        }); 

       Schema::table('activities', function (Blueprint $table) {
           $table->foreign('activity_type_id')->references('id')->on('activity_types');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('activities');
    }
}
