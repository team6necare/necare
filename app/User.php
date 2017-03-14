<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

//added the following line for roles 22 Feb 2017, by CMM
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
	//added the following line for roles 22 Feb 2017, by CMM
	use EntrustUserTrait;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
