<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Victim extends Model
{
    //
	 //
	public $fillable = [
			'victim_refno',
            'last_name',
            'first_name',
            'street_address',
            'city',
            'state',
            'zip',
            'email',
			'home_phone',
            'mobile_phone',
			'cancer_type_id',
			'notes'	,
            'full_name' 		
			];
			
	public function cancer_type() {
        return $this->belongsTo('App\Cancer_Type');
    }

    public function activitydetails() {
            return $this->hasMany('App\Activitydetail', 'victim_id');

        }

          public function getFullNameAttribute(){
        //return preg_replace('/\s+/', ' ',$this->first_name.' '.$this->last_name);
        $full_name = $this->first_name . " " . $this->last_name ;
        return $full_name;
        }
}
