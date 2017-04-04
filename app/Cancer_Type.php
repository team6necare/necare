<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancer_Type extends Model
{
	protected $table = 'cancer_types';
    public $fillable = [
    		'name',
    		'description'
    ];

    public function volunteers() {
        return $this->hasMany('App\Volunteer', 'cancer_type_id');

        }

    public function victims() {
        return $this->hasMany('App\Victim', 'cancer_type_id');

        }
}
