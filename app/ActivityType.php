<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    protected $table = 'activity_types';
    public $fillable = ['name','description', 'min_participants'];


public function activities() {
        return $this->hasMany('App\Activity', 'activity_type_id');

    }
}
