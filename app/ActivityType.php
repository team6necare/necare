<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    protected $table = 'Activity_Types';
    public $fillable = ['name','description', 'min_participants'];
}
