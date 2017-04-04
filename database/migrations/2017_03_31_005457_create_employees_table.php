<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
			$table->string('employee_number');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('street_address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('email');
            $table->string('work_phone');
            $table->string('mobile_phone');
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
        Schema::drop('employees');
    }
}
