<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //protected $table = 'activities';
    public $fillable = [
    		'activity_refno',
            'description',
    		'start_datetime',
    		'end_datetime',
    		'status',
    		'cost',
    		'location_id',
    		'activity_type_id'
    ];


        public function location() {
            return $this->belongsTo('App\Location');
        }
        public function activitytype() {
            return $this->belongsTo('App\ActivityType');
            
        }
        
        public function activitydetails() {
            return $this->hasMany('App\Activitydetail', 'activity_id');

        }
}
