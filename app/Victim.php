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
			'notes'			
			];
			
	public function cancer_type() {
        return $this->belongsTo('App\Cancer_Type');
    }

    public function activitydetails() {
            return $this->hasMany('App\Activitydetail', 'victim_id');

        }
}
