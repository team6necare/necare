<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     /**
	 *the following code wass added by CMM on 21 Jan 2016 for creation of tables
	 */
	 Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
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
     /**
	 *the following code wass added by CMM on 21 Jan 2016 for dropping of tables
	 */
	 Schema::drop('posts');
    }
}
