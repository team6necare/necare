<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
	/**
	*code below was added by CMM on 21 Jan 2017
	*about what fields we are planning to add and update in the database and also 
	*protect the application from mass assignment vulnerabilities
	*/
	protected $fillable=[
	'title',
	'description'
	];
}
