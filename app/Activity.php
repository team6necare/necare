<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

        public function notifications() {
            return $this->hasMany('App\Notification', 'activity_id');

        }

public static function future()
    {
        return Activity::where('start_datetime', '>', Carbon::now())
                        ->orderBy('start_datetime', 'desc')->get();
    }

    public static function present()
    {
        return Activity::where('start_datetime', '<', Carbon::now())
                        ->where('end_datetime', '>', Carbon::now())
                        ->orderBy('start_datetime', 'desc')->get();
    }

    public static function past()
    {
        return Activity::where('end_datetime', '<', Carbon::now())
                        ->orderBy('start_datetime', 'desc')->get();
    }

        // Helper function to return the ongoing or upcoming event
    public static function ongoingOrUpcoming()
    {
        $ongoing = Activity::present()->all();

        if(!empty($ongoing))
        {
            return $ongoing;
        }

        $upcoming = Activity::future()->all();

        if(!empty($upcoming))
        {
            return $upcoming;
        }

        return false;
    }  


    public function getFullNameAttribute()
        {
            return "$this->activity_refno: $this->description: From: $this->start_datetime To: $this->end_datetime";
        }
     

}
