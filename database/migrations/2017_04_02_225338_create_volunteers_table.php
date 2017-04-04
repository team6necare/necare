<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('volunteers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('volunteer_refno');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('street_address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('email');
            $table->string('work_phone');
            $table->string('mobile_phone');
            $table->integer('cancer_type_id')->unsigned();
            $table->integer('activity_id')->unsigned();
            $table->string('notes');
            $table->timestamps();
            
        });

       Schema::table('volunteers', function (Blueprint $table) {
           $table->foreign('cancer_type_id')->references('id')->on('cancer_types');
       });

            Schema::table('volunteers', function (Blueprint $table) {
           $table->foreign('activity_id')->references('id')->on('activity_types');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('volunteers');
    }
}
