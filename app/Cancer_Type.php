<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancer_Type extends Model
{
	protected $table = 'cancer_types';
    public $fillable = ['name','description'];
}
