<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	
    public $fillable = [
    'location_code',
    'name',
    'street_address',
    'city',
    'state',
    'zip',
    'notes'
    ];


public function activities() {
        return $this->hasMany('App\Activity', 'location_id');

        }
    }
