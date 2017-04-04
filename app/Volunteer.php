<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    //
	public $fillable = [
			'volunteer_refno',
            'last_name',
            'first_name',
            'street_address',
            'city',
            'state',
            'zip',
            'email',
			'work_phone',
            'mobile_phone',
			'cancer_type_id',
			'notes'			
			];
			
	public function cancer_type() {
        return $this->belongsTo('App\Cancer_Type');
    }

    public function activitydetails() {
            return $this->hasMany('App\Activitydetail', 'volunteer_id');

        }

    public function getFullNameAttribute(){
        return preg_replace('/\s+/', ' ',$this->first_name.' '.$this->last_name);
        }

    public function volunteerschedules() {
        return $this->hasMany('App\VolunteerSchedule', 'volunteer_id');
    }

}
