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
            $table->string('sunday_morning');
            $table->string('sunday_afternoon');
            $table->string('monday_morning');
            $table->string('monday_afternoon');
			$table->string('tuesday_morning');
            $table->string('tuesday_afternoon');
			$table->string('wednesday_morning');
            $table->string('wednesday_afternoon');
			$table->string('thursday_morning');
            $table->string('thursday_afternoon');
			$table->string('friday_morning');
            $table->string('friday_afternoon');
			$table->string('saturday_morning');
            $table->string('saturday_afternoon');
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
