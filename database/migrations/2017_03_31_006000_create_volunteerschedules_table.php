<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteerSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('volunteerschedules', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('volunteer_id')->unsigned();
            $table->date('valid_from');
            $table->date('valid_to');
            $table->string('sunday_morning')->nullable();
            $table->string('sunday_afternoon')->nullable();
            $table->string('monday_morning')->nullable();
            $table->string('monday_afternoon')->nullable();
			$table->string('tuesday_morning')->nullable();
            $table->string('tuesday_afternoon')->nullable();
			$table->string('wednesday_morning')->nullable();
            $table->string('wednesday_afternoon')->nullable();
			$table->string('thursday_morning')->nullable();
            $table->string('thursday_afternoon')->nullable();
			$table->string('friday_morning')->nullable();
            $table->string('friday_afternoon')->nullable();
			$table->string('saturday_morning')->nullable();
            $table->string('saturday_afternoon')->nullable();
            $table->timestamps();
        });

        Schema::table('volunteerschedules', function (Blueprint $table) {
           $table->foreign('volunteer_id')->references('id')->on('volunteers');
        });
	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('volunteerschedules');
    }
}
