<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activitydetail extends Model
{
    public $fillable = [
			'activity_id',
			'volunteer_id',
			'victim_id',
			'employee_id',
			'comments',
			'feedback'			
			];
			

    public function activity() {
        return $this->belongsTo('App\Activity');
    }
    public function volunteer() {
        return $this->belongsTo('App\Volunteer');
    }
     public function victim() {
        return $this->belongsTo('App\Victim');
    }

     public function employee() {
        return $this->belongsTo('App\Employee');
    }


}


