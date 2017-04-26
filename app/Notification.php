<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //protected $table = 'notifications';
    public $fillable = [
            'reference_number',
            'activity_id',
            'to_all_volunteers',
            'to_all_victims',
            'to_all_employees',
            'notification_subject',
            'notification_message'
    ];
 
        public function activity() {
            return $this->belongsTo('App\Activity');
        }
        
}
