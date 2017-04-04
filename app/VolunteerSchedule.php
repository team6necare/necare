<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VolunteerSchedule extends Model
{
    //
  protected $table = 'volunteerschedules';

	public $fillable = [
						
			        'volunteer_id',
              'valid_from',
              'valid_to',
              'sunday_morning',
              'sunday_afternoon',
              'monday_morning',
              'monday_afternoon',
			        'tuesday_morning',
              'tuesday_afternoon',
			        'wednesday_morning',
              'wednesday_afternoon',
			        'thursday_morning',
              'thursday_afternoon',
			        'friday_morning',
              'friday_afternoon',
			        'saturday_morning',
              'saturday_afternoon'
			];
			
			
	public function volunteer() {
        return $this->belongsTo('App\Volunteer');
    }
}
