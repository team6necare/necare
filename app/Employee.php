<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

	public $fillable = [
			'employee_number',
            'last_name',
            'first_name',
            'street_address',
            'city',
            'state',
            'zip',
            'email',
		'work_phone',
            'mobile_phone'
		];

      public function activitydetails() {
            return $this->hasMany('App\Activitydetail', 'employee_id');

        }

}
