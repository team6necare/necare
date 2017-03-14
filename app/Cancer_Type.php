<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancer_Type extends Model
{
	protected $table = 'Cancer_Types';
    public $fillable = ['name','description'];
}
