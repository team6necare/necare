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
            'mobile_phone',
            'full_name'
		];

      public function activitydetails() {
            return $this->hasMany('App\Activitydetail', 'employee_id');

        }
       public function getFullNameAttribute(){
        //return preg_replace('/\s+/', ' ',$this->first_name.' '.$this->last_name);
        $full_name = $this->first_name . " " . $this->last_name ;
        return $full_name;
        }

}
