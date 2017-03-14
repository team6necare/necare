<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVictimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('victims', function (Blueprint $table) {
            $table->increments('id');
			$table->string('victim_refno');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('street_address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('email');
            $table->string('home_phone');
            $table->string('mobile_phone');
            $table->integer('cancer_type_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('victims', function (Blueprint $table) {
           $table->foreign('cancer_type_id')->references('id')->on('cancer_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('victims');
    }
}
